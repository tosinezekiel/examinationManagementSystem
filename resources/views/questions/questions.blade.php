@extends('layouts.template')
@section('content')
    <body >
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                   <h4 class="title"> CRUD APPLICATION <span class="float-right">[all questions]</span></h4>
                </div>
                <div class="col-12">
                    <a href="/">Home</a> |
                    <a href="/questions/create">Add Question</a>
                 </div>
            </div>

            <div class="row mt-3">
                <div class="col-6 questions">
                    
                </div>
            </div>
            
        </div>


        {{-- modal --}}
        <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <textarea class="form-control" id="question" rows="3"></textarea>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="option_a">Option A:</label>
                            <input type="text" class="form-control" id="option_a" placeholder="enter option here...">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="option_b">Option B:</label>
                            <input type="text" class="form-control" id="option_b" placeholder="enter option here...">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="option_c">Option C:</label>
                              <input type="text" class="form-control" id="option_c" placeholder="enter option here...">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="option_d">Option D:</label>
                              <input type="text" class="form-control" id="option_d" placeholder="enter option here...">
                            </div>
                            <input type="hidden" id="id" name="">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="correct">Correct Answer:</label>
                                    <select class="custom-select" id="correct_option">
                                        <option selected>Choose...</option>
                                        <option value="a">option A</option>
                                        <option value="b">option B</option>
                                        <option value="c">option C</option>
                                        <option value="d">option D</option>
                                    </select>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="correct">Category:</label>
                                    <select class="custom-select" id="category">
                                        <option selected>Choose...</option>
                                    </select>
                               
                            </div>
                        </div>

                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="submit">Save changes</button>
                </div>
              </div>
            </div>
        </div>


    </body>
@endsection
@section('siteScript')
    @include('scripts.index')
@endsection

