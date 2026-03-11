@extends('users.layouts.app')
@section('style')
@endsection
@section('content')
<div id="loader"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; display:flex; justify-content:center; align-items:center;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
<div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3>Update Report</h3>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                              
                               
                            <form action="{{ route('update.dashboardone', ['user' => $user->id]) }}" method="POST">
                            @csrf
                                @method('PUT')
                                <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                                <label for="form1a" class="color-highlight">Udyog Aadhar No </label>
                                <input type="text" class="form-control validate-date" name="UdyogAadharNo" value="{{$user->UdyogAadharNo}}" id="" placeholder="">
                              
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Enterprise Name </label>
                                <input type="text" class="form-control validate-date" name="EnterpriseName" value="{{$user->EnterpriseName}}"  id="" placeholder="E">
                              
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Address</label>
                                <input type="text" class="form-control validate-date" name="Address" value="{{$user->Address}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> PINCode</label>
                                <input type="number" class="form-control validate-date" name="PINCode" value="{{$user->PINCode}}"  id="" placeholder="">
                               
                               
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> Total Employee</label>
                                <input type="number" class="form-control " name="TotalEmp" value="{{$user->TotalEmp}}"  id="" placeholder="">
                              
                              
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight"> Owner Name</label>
                                <input type="text" class="form-control " name="OwnerName" value="{{$user->OwnerName}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight"> Mobile No</label>
                                <input type="number" class="form-control " name="MobileNo" value="{{$user->MobileNo}}"  id="" placeholder="">
                             
                             
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Email Id</label>
                                <input type="email" class="form-control " name="EmailId" value="{{$user->EmailId}}"  id="" placeholder="">
                                
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight"> Gender</label>
                                <input type="text" class="form-control " name="Gender" value="{{$user->Gender}}"  id="" placeholder="">
                               
                              
                            </div>
                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Social Category </label>
                                <input type="text" class="form-control " name="SocialCategory" value="{{$user->SocialCategory}}"  id="" placeholder="">
                             
                                
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Major Activity </label>
                                <input type="text" class="form-control " name="MajorActivity" value="{{$user->MajorActivity}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="form1a" class="color-highlight">Dic Name </label>
                                <input type="text" class="form-control " name="Dic_Name" value="{{$user->Dic_Name}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Incorporation Date </label>
                                <input type="text" class="form-control " name="IncorporationDate" value="{{$user->IncorporationDate}}"  id="" placeholder="">
                                
                               
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Commence Date </label>
                                <input type="date" class="form-control " name="CommmenceDate" value="{{$user->CommmenceDate}}"  id="" placeholder="">
                            </div>

                            <div class="meetingurl input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Create Date</label>
                                <input type="date" class="form-control " name="CreateDate" value="{{$user->CreateDate}}"  id="" placeholder="">
                             
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">State</label>
                                <input type="text" class="form-control " name="State" value="{{$user->State}}"  id="" placeholder="">
                           
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">District</label>
                                <input type="text" class="form-control " name="District" value="{{$user->District}}"  id="" placeholder="">
                             
                              
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">State Name</label>
                                <input type="text" class="form-control " name="state_name" value="{{$user->state_name}}"  id="" placeholder="">
                                
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Distrcit Name</label>
                                <input type="text" class="form-control" name="DISTRICT_NAME" value="{{$user->DISTRICT_NAME}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Organization Type </label>
                                <input type="text" class="form-control " name="OrganisationType" value="{{$user->OrganisationType}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Previous EMType </label>
                                <input type="text" class="form-control " name="PreviousEMType" value="{{$user->PreviousEMType}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Previous EMNumber</label>
                                <input type="text" class="form-control " name="PreviousEMNumber" value="{{$user->PreviousEMNumber}}"  id="" placeholder="">
                             
                                
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Enterprise Type </label>
                                <input type="text" class="form-control " name="EnterpriseType" value="{{$user->EnterpriseType}}"  id="" placeholder="">
                               
                               
                            </div>

                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Activity Detail </label>
                                <input type="text" class="form-control " name="ActivityDetail" value="{{$user->ActivityDetail}}"  id="" placeholder="">
                               
                               
                            </div>
                            
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Net Turnover </label>
                                <input type="number" class="form-control " name="NetTurnover" value="{{$user->NetTurnover}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Create Date1 </label>
                                <input type="date" class="form-control " name="CreateDate1" value="{{$user->CreateDate1}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight">Latitude</label>
                                <input type="number" class="form-control " name="Latitude" value="{{$user->Latitude}}"  id="" placeholder="">
                              
                               
                            </div>
                            <div class=" input-style input-style-always-active has-borders no-icon validate-field my-4" >
                            <label for="" class="color-highlight"> Longitude</label>
                                <input type="number" class="form-control " name="Longitude" value="{{$user->Longitude}}"  id="" placeholder="">
                            </div>
<div class="text-center">
<input type="submit" class="btn btn-sm btn-primary text-center" vlaue="Submit">

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
            }, 4000);
        });
    </script>
@endsection
