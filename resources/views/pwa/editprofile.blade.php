 @extends('pwa.layout.app')
 @section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')
         <div class="page-title page-title-small">
                <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Edit Profile
                </h2>
                <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
                    data-src="images/avatars/5s.png"></a>
            </div>
            <div class="card header-card shape-rounded" data-card-height="90">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
            </div>

            <!-- <div class="card card-style">
            <div class="content">
                Packed with powerful built pages that are highly customizable and blazing fast to load. We've categorized our pages by purpose to make it easier for you to find them.
            </div>
        </div> -->
        @if(session('success'))
        <div id="success-alert">
            <h6 class="alert bg-success text-white">{{ session('success') }}</h6>
        </div>
        @endif
            <div class="d-flex flex-column gap-2  mt-5 mb-3">
                <!-- <div class="d-flex flex-column align-items-center">
                   <h5 class="font-aneka">Edit Profile</h5>
                </div> -->
                <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
                    <div class="card-body">
                        <form action="{{route('profile.update',$employee->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employeeName" class="form-label mb-0 font-aneka fontsize">Employee
                                    Name</label>
                                <input type="text" class="form-control" id="employeeName"
                                    placeholder="enter employee name" name="emp_name" value="{{$employee->emp_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="socialCategory" class="form-label mb-0 font-aneka fontsize">Social
                                    Category</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected class="font-aneka" name="category">Select Social Category</option>
                                     @foreach($data['category'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->category == $subcategory ? 'selected' : '' }}  class="font-aneka">{{$subcategory}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subCategory" class="form-label mb-0 font-aneka fontsize">Sub
                                    Category</label>
                                <select class="form-select" aria-label="Default select example" name="sub_category">
                                    <option selected class="font-aneka" value="">Select Sub Category</option>
                                    @foreach($data['sub_category'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->sub_category == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label mb-0 font-aneka fontsize">District</label>
                                <select class="form-select" name="district" aria-label="Default select example">
                                    <option selected class="font-aneka">Select District</option>
                                      @foreach($data['district'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->district == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="taluk" class="form-label mb-0 font-aneka fontsize">Taluk</label>
                                <select class="form-select" name="taluk" aria-label="Default select example">
                                    <option selected class="font-aneka" value="">Select Taluk</option>
                                     @foreach($data['taluk'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->taluk == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="DR/PR" class="form-label mb-0 font-aneka fontsize">DR/PR</label>
                                <select class="form-select" name="DR_PR" aria-label="Default select example">
                                    <option selected class="font-aneka">Select </option>
                                     @foreach($data['DR_PR'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->DR_PR == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ncadre" class="form-label mb-0 font-aneka fontsize">Type Cadre</label>
                                <select class="form-select" name="cadre_type" aria-label="Default select example">
                                    <option selected class="font-aneka">Select Type Cadre</option>
                                    @foreach($data['cadre_type'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->cadre_type == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="dateofbirth" class="form-label mb-0 font-aneka fontsize">Date of
                                    Birth</label>
                                <input type="date" class="form-control" id="dateofbirth" placeholder="" value="{{ \Carbon\Carbon::parse($employee->dob)->format('Y-m-d') }}" name="dob">
                            </div>
                            <div class="mb-3">
                                <label for="dateofjoining" class="form-label mb-0 font-aneka fontsize">Date of
                                    joining</label>
                                <input type="date" class="form-control" id="dateofjoining" placeholder="" value="{{ \Carbon\Carbon::parse($employee->doj)->format('Y-m-d') }}" name="doj">
                            </div>
                            <div class="mb-3">
                                <label for="postHeldFrom" class="form-label mb-0 font-aneka fontsize">Post Held
                                    From</label>
                                <input type="date" class="form-control" id="postHeldFrom" placeholder="" value="{{ \Carbon\Carbon::parse($employee->post_held_from)->format('Y-m-d') }}" name="post_held_from">
                            </div>
                            <div class="mb-3">
                                <label for="dateofRetirement" class="form-label mb-0 font-aneka fontsize">Date of
                                    Retirement</label>
                                <input type="date" class="form-control" id="dateofRetirement" placeholder="" value="{{ \Carbon\Carbon::parse($employee->dor)->format('Y-m-d') }}" name="dor">
                            </div>
                            <div class="mb-3">
                                <label for="Designation" class="form-label mb-0 font-aneka fontsize">Designation</label>
                                <select class="form-select" name="designation" aria-label="Default select example">
                                    <option selected class="font-aneka">Select Designation</option>
                                      @foreach($data['designation'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->designation == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Group" class="form-label mb-0 font-aneka fontsize">Group</label>
                                <select class="form-select" name="group" aria-label="Default select example">
                                    <option selected class="font-aneka">Select Group</option>
                                     @foreach($data['group'] as $subcategory)
                                    <option value="{{$subcategory}}" {{ $employee->group == $subcategory ? 'selected' : '' }} class="font-aneka">{{$subcategory}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Gender" class="form-label mb-0 font-aneka fontsize">Gender</label>
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option selected class="font-aneka" value="">Select Gender</option>
                                    <option value="Male" class="font-aneka">Male</option>
                                    <option value="Female" class="font-aneka">Female</option>
                                    <option value="Other" class="font-aneka">Other</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Phone" class="form-label mb-0 font-aneka fontsize">Phone <span class="text-danger">Note:- Phone number linked to HRMS</span></label>
                                <input type="tel" class="form-control" id="Phone" pattern="[0-9]{10}" minlength="10"
                                    maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    placeholder="enter phone no" name="phone" value="{{$employee->phone}}">
                            </div>
                            <div class="mb-3">
                                <label for="DateofIncrement" class="form-label mb-0 font-aneka fontsize">Date of
                                    Increment</label>
                                <input type="date" class="form-control" id="DateofIncrement" placeholder=""  value="{{ \Carbon\Carbon::parse($employee->increment)->format('Y-m-d') }}" name="increment">
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                                <button class="btn btn-primary" type="submit" style="border-radius: 10px;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
@section('script')
<script>
    // Hide success message after 30 seconds (30000 ms)
    setTimeout(function() {
        let success = document.getElementById('success-alert');
        if (success) {
            success.style.display = 'none';
        }

        let error = document.getElementById('error-alert');
        if (error) {
            error.style.display = 'none';
        }
    }, 30000);
</script>
@endsection