@extends('reports.layouts.app')
@section('style')
@endsection
@section('content')
<div id="loader"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; display:flex; justify-content:center; align-items:center;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class=" m-3 btn btn-primary">Back</a>

<div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3> Sarojini Mahishi Report </h3>
                                 <h6 class="m-3"> Update Report </h6>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i
                                                data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"> Dashboard</li>
                                    <li class="breadcrumb-item active"> Update Report</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                              
                               
                          <form action="{{ route('update.dashboardtwo', ['usertwo' => $usertwo->id]) }}" method="POST">
                            @csrf
                                @method('PUT')
                                <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                                <label for="form1a" class="color-highlight">District </label>
                                <input type="text" class="form-control validate-date" name="district" value="{{$usertwo->district}}" id="" placeholder="">
                              
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Division </label>
                                <input type="text" class="form-control validate-date" name="divisions" value="{{$usertwo->divisions}}"  id="" placeholder="E">
                              
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Kannada Group A</label>
                                <input type="text" class="form-control validate-date" name="kannadiga_g1" value="{{$usertwo->kannadiga_g1}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> Others Group A</label>
                                <input type="text" class="form-control validate-date" name="others_g1" value="{{$usertwo->others_g1}}"  id="" placeholder="">
                               
                               
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Total Group A </label>
                                <input type="text" class="form-control " name="total_g1" value="{{$usertwo->total_g1}}"  id="" placeholder="">
                              
                              
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight"> Percentage A</label>
                                <input type="text" class="form-control " name="percent_g1" value="{{$usertwo->percent_g1}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Kannada Group B </label>
                                <input type="text" class="form-control " name="kannadiga_g2" value="{{$usertwo->kannadiga_g2}}"  id="" placeholder="">
                             
                             
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight"> Others Group B</label>
                                <input type="text" class="form-control " name="others_g2" value="{{$usertwo->others_g2}}"  id="" placeholder="">
                                
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> Total Group B</label>
                                <input type="text" class="form-control " name="total_g2" value="{{$usertwo->total_g2}}"  id="" placeholder="">
                               
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Percentage Group B</label>
                                <input type="text" class="form-control " name="percent_g2" value="{{$usertwo->percent_g2}}"  id="" placeholder="">
                             
                                
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> Kannada Group C </label>
                                <input type="text" class="form-control " name="kannadiga_g3" value="{{$usertwo->kannadiga_g3}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Others Group C </label>
                                <input type="text" class="form-control " name="others_g3" value="{{$usertwo->others_g3}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Total Group C Date </label>
                                <input type="text" class="form-control " name="total_g3" value="{{$usertwo->total_g3}}"  id="" placeholder="">
                                
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Percentage Group C </label>
                                <input type="text" class="form-control " name="percent_g3" value="{{$usertwo->percent_g3}}"  id="" placeholder="">
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Kannada Group D</label>
                                <input type="text" class="form-control " name="kannadiga_g4" value="{{$usertwo->kannadiga_g4}}"  id="" placeholder="">
                             
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Others Group D</label>
                                <input type="text" class="form-control " name="others_g4" value="{{$usertwo->others_g4}}"  id="" placeholder="">
                           
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Total Group D</label>
                                <input type="text" class="form-control " name="total_g4" value="{{$usertwo->total_g4}}"  id="" placeholder="">
                             
                              
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Percentage Group D</label>
                                <input type="text" class="form-control " name="percent_g4" value="{{$usertwo->percent_g4}}"  id="" placeholder="">
                                
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Total Kannada</label>
                                <input type="text" class="form-control" name="total_kannadiga" value="{{$usertwo->total_kannadiga}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Total Others </label>
                                <input type="text" class="form-control " name="others_total" value="{{$usertwo->others_total}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Total  </label>
                                <input type="text" class="form-control " name="total" value="{{$usertwo->total}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Percentage</label>
                                <input type="text" class="form-control " name="percentage" value="{{$usertwo->percentage}}"  id="" placeholder="">
                             
                                
                            </div>

                          
<div class="text-center">
<input type="submit" class="btn btn-sm btn-primary text-center" value="Submit">

</div>
                              </form>

                               
                            </div>

                        </div>

                    </div>

                </div>

@endsection
@section('script')
<script>
        $(document).ready(function() {
            // Show loader on form submission
            // $("form").on("submit", function() {
            //     $("#loader").fadeIn(); // Show loader
            // });

            // Hide loader and success message after 3 seconds
            setTimeout(function() {
                $(".alert-success").fadeOut("slow");
                $("#loader").fadeOut(); // Hide loader
            }, 2000);
        });
    </script>
@endsection
