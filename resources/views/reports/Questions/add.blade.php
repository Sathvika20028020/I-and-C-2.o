@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Add </h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active">  </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                   
                  </div>
                  <div class="card-body">
                    <form id="actionForm" action="{{ route('question.store') }}" method="post">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        <div class="row">
                          <!-- Initiatives Field -->
                  
                          <div class="col-md-6">
                            <label class="form-label fw-bold">Department <span class="text-danger"> *</span></label>
                            <div class="input-group">
                              <select id="" class="form-select" name="department">
                                <option selected disabled>Select...</option>
                                <option value="Department 1">Department 1</option>
                                <option value="Department 2">Department 2</option>
                                <option value="Department 3">Department 3</option>
                                <option value="Department 4">Department 4</option>
                              </select>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Question No.</label>
                          <input type="text" class="form-control" name="number" id="question" placeholder="45" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Question asked by</label>
                            <input type="text" class="form-control" name="asked_by" id="questionby" placeholder="Asked by" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Question answered by</label>
                            <input type="text" class="form-control" name="answered_by" id="questionansby" placeholder="Answered by" required>
                        </div> 
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Answered date <span class="text-danger"> *</span></label>
                            <input type="date" class="form-control" name="date" id="ansdate" placeholder="Answered date" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Question <span class="text-danger"> *</span></label>
                            <textarea type="text" class="form-control" name="question" id="question" placeholder="Question" required></textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Answer <span class="text-danger"> *</span></label>
                            <textarea type="text" class="form-control" name="answer" id="answer" placeholder="Answer" required></textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Keywords <span class="text-danger"> *</span></label>
                          <input type="text" name="keywords" class="form-control" id="keywordsInput" placeholder="Type and hit enter" required>
                        </div>
                        
                        <div class="col-md-6 mt-3">
                          <div class="">
                            <div class="media">
                              <label class="col-form-label fw-bold">Status</label>
                              <div class="media-body">
                                <label class="switch m-3">
                                  <input type="checkbox" name="status" value="1"><span class="switch-state"></span>
                                </label>
                              </div>
                            </div>
                          </div> 
                        </div>
                        

                      </div>
                      
          
                     
          
                      <!-- Submit Button -->
                      <div class="text-end mt-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
 




@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
        var input = document.querySelector('#keywordsInput');
        new Tagify(input,{
          originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });
    </script>

@endsection