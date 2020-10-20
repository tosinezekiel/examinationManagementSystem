<script>
$(document).ready(function(){

    let errormsg = $('.alert-danger');

    let question_content = $('.questions');
    
    errormsg.hide();

    $.ajax({
        type: "GET",
        url: webRoot + "/api/categories",
        contentType: "application/json",
        success: function(response){
            let data = response.data;
            if(data.length > 0){
                console.log(data)
                for(let i = 0; i < data.length; i++){
                    question_content.append(`
                    <div class="row" style="margin-top:50px;">
                        <div class="col-12 cat">
                        <h3> ${data[i].name} </h3><hr>
                        </div>
                    </div>
                    <div class="row cat_${i}">
                        
                    </div>`)
                        let que = data[i].questions
                        console.log(que)
                        let inner_div = $('.cat_'+i)
                        if(que.length < 1){
                            inner_div.append(`No question for this category, <a href="/questions/create"> add here</a>`)
                        }
                        for(let i = 0; i < que.length; i++){
                            inner_div.append(
                                ` 
                                        <div class="col-12 title mt-3">
                                            <h5>${i + 1}. ${que[i].title}</h5> <hr>
                                        </div> 
                                        <div class="col-6">
                                            (a). ${que[i].options.a}
                                        </div>
                                        <div class="col-6">
                                            (b). ${que[i].options.b}
                                        </div>
                                        <div class="col-6">
                                            (c). ${que[i].options.c}
                                        </div>
                                        <div class="col-6">
                                            (d). ${que[i].options.d}
                                        </div>
                                        <button class="btn btn-primary btn-sm ml-3 mt-2 edit" data-id=${que[i].id}>Edit</button>
                                        <button class="btn btn-danger btn-sm ml-3 mt-2 delete" data-id=${que[i].id}>Delete</button>
                                `
                            );
                        }
                }
                return false
            }
            question_content.append(`
                    <div class="row"><div class="col-12">
                        <h3> No Questions Available </h3><hr>
                        </div>
                    </div>
            `)
        },
        error: function (response) { 
            $('#category').attr("disabled", false);
            response = JSON.parse(response.responseText);
            let error_type = response.error_type;
            errormsg.show()
            errormsg.html(response.message);
            return false;
        }
    });

    

    //delete
    $(document).on("click", ".delete", function(){
        let id = $(this).attr('data-id');
        $.ajax({
            type: "DELETE",
            url: webRoot + `/api/questions/${id}`,
            contentType: "application/json",
            success: function(response){
                if(!response.status){
                    alert(response.message)
                    return false
                }
                alert(response.message)
            },
            error: function (response) { 
                response = JSON.parse(response.responseText);
                let error_type = response.error_type;
                console.log(response.message);
                
                return false;
            }
        });

    })


    //edit
    let data = {}
    let question = $('#question')
    let option_a = $('#option_a')
    let option_b = $('#option_b')
    let option_c = $('#option_c')
    let option_d = $('#option_d')
    let correct_option = $('#correct_option')


    $(document).on("click", ".edit", function(){
        let id = $(this).attr('data-id');
        
        $.ajax({
            type: "GET",
            url: webRoot + `/api/questions/${id}`,
            contentType: "application/json",
            success: function(response){
                if(!response.status){
                    alert(response.message)
                    return false
                }
                let data = response.data;
                question.val(data.title)
                option_a.val(data.options.a)
                option_b.val(data.options.b)
                option_c.val(data.options.c)
                option_d.val(data.options.d)
                correct_option.val(data.options.correct_answer)
                $('#id').val(data.id)
                $('#questionModal').modal()
            },
            error: function (response) { 
                $('#submit').attr("disabled", false);
                response = JSON.parse(response.responseText);
                let error_type = response.error_type;
                console.log(response.message);
                
                return false;
            }
        });

    })

    //update
    $('#submit').click(function(e){
        e.preventDefault()
        $(this).attr("disabled", true);
        data.title = question.val()
        data.a = option_a.val()
        data.b = option_b.val()
        data.c = option_c.val()
        data.d = option_d.val()
        data.correct_answer = correct_option.val()
        
        

        let id = $('#id').val()
        $.ajax({
            type: "PUT",
            url: webRoot + `/api/questions/${id}`,
            data: JSON.stringify(data),
            dataType: "json",
            contentType: "application/json",
            success: function(response){
                console.log(response)
                $('#submit').attr("disabled", false);
                if(response.status){
                    alert(response.message)
                    location.reload()
                    $('#questionModal').modal('hide')
                }
            },
            error: function (response) { 
                $('#submit').attr("disabled", false);
                response = JSON.parse(response.responseText);
                let error_type = response.error_type;
               alert(response.message);
                
                return false;
            }
        });

    })
    
});

</script>