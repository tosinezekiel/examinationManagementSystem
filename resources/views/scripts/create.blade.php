<script>
    $(document).ready(function(){

        let msg = $('.alert-primary');
        let errormsg = $('.alert-danger');

        msg.hide()
        errormsg.hide()

        let data = {}
        let question = $('#question')
        let option_a = $('#option_a')
        let option_b = $('#option_b')
        let option_c = $('#option_c')
        let option_d = $('#option_d')
        let correct_option = $('#correct_option')
        let category = $('#category')

        

        $('#category').attr("disabled", true);

        $.ajax({
            type: "GET",
            url: webRoot + "/api/categories",
            contentType: "application/json",
            success: function(response){
                let data = response.data;
                
                for (let i = 0; i < data.length; i++) {
                    category.append(`<option value="${data[i].id}">${data[i].name}</option>`);
                }
                $('#category').attr("disabled", false);
            },
            error: function (response) { // error callback 
                $('#category').attr("disabled", false);
                response = JSON.parse(response.responseText);
                let error_type = response.error_type;
                errormsg.show()
                errormsg.html(response.message);
                return false;
            }
        });

        $('#submit').click(function(e){
            e.preventDefault()
            $(this).attr("disabled", true);
            data.question = question.val()
            data.category = category.val()
            data.option_a = option_a.val()
            data.option_b = option_b.val()
            data.option_c = option_c.val()
            data.option_d = option_d.val()
            data.correct_option = correct_option.val()
            
            question.val("")
            category.val("")
            option_a.val("")
            option_b.val("")
            option_c.val("")
            option_d.val("")
            correct_option.val("")

            $.ajax({
                type: "POST",
                url: webRoot + "/api/questions",
                data: JSON.stringify(data),
                dataType: "json",
                contentType: "application/json",
                success: function(response){
                    console.log(response)
                    $('#submit').attr("disabled", false);
                    if(response.status){
                        msg.show()
                        msg.html(response.message)
                    }
                },
                error: function (response) { // error callback 
                    $('#submit').attr("disabled", false);
                    response = JSON.parse(response.responseText);
                    let error_type = response.error_type;
                    errormsg.html(response.message);
                    errormsg.show()
                    
                    return false;
                }
            });

        })
        
    });
</script>