@extends('layouts.template')
@section('content')
    <body >
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                   <h4 class="title"> CRUD APPLICATION <span class="float-right">[add question]</span></h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <div class="alert alert-primary" role="alert">
                       
                    </div>
                    <div class="alert alert-danger" role="alert">
                    
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <textarea class="form-control" id="question" rows="3" style="resize: none;"></textarea>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="option_a">Option A:</label>
                            <input type="text" class="form-control" id="option_a" placeholder="enter option here..." required />
                          </div>
                          <div class="form-group col-md-6">
                            <label for="option_b">Option B:</label>
                            <input type="text" class="form-control" id="option_b" placeholder="enter option here..." required />
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="option_c">Option C:</label>
                              <input type="text" class="form-control" id="option_c" placeholder="enter option here..." required />
                            </div>
                            <div class="form-group col-md-6">
                              <label for="option_d">Option D:</label>
                              <input type="text" class="form-control" id="option_d" placeholder="enter option here..." required />
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="correct">Correct Answer:</label>
                                    <select class="custom-select" id="correct_option" required >
                                        <option selected>Choose...</option>
                                        <option value="a">option A</option>
                                        <option value="b">option B</option>
                                        <option value="c">option C</option>
                                        <option value="d">option D</option>
                                    </select>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="correct">Category:</label>
                                    <select class="custom-select" id="category" required>
                                        <option selected>Choose...</option>
                                    </select>
                               
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        <a href="/questions">See all Questions</a>
                      </form>
                </div>
            </div>
            
        </div>
    </body>
@endsection
@section('siteScript')
    @include('scripts.create')
@endsection

