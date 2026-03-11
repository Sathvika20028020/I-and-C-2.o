@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>List </h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
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
                  <div class="table-responsive">
                    <table class="display" id="advance-1">
                      <thead>
                        <tr>
                          <th class="whitespace">SI No.</th>
                          <th class="whitespace">Salutation</th>
                          <th class="whitespace">Employee Name</th>
                          <th class="whitespace">Social Category</th>
                          <th class="whitespace">Sub-Category</th>
                          <th class="whitespace">District Name</th>
                          <th class="whitespace">Taluk Name</th>
                          <th class="whitespace">DR/PR</th>
                          <th class="whitespace"> Date of birth</th>
                          <th class="whitespace">Date of joining</th>
                          <th class="whitespace">Gender</th>
                          <th class="whitespace">Phone</th>
                          <th class="whitespace">Status</th>
                          <th style="min-width:100px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($entries as $entry)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$entry->salutation}}</td>
                          <td>{{$entry->emp_name}}</td>
                          <td>{{$entry->category}}</td>
                          <td>{{$entry->sub_category}}</td>
                          <td>{{$entry->post_district}}</td>
                          <td>{{$entry->post_taluk}}</td>
                          <td>{{$entry->DR_PR}}</td>
                          <td>{{$entry->dob}}</td>
                          <td>{{$entry->doj}}</td>
                          <td>{{$entry->gender}}</td>
                          <td>{{$entry->phone}}</td>
                          <td><span class="badge badge-warning">Pending</span></td>
                          <td>
                            <a href="{{route('profile_update.edit', $entry->id)}}"><button class="btn btn-primary">View</button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>




@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if(session('success'))
  Swal.fire({
        icon: 'success',
        title: 'Accepted!',
        text: 'Profile updated successfully.',
        confirmButtonColor: '#3085d6'
      });
  @elseif(session('error'))
  Swal.fire({
        icon: 'success',
        title: 'Rejected!',
        text: 'Profile change rejected successfully.',
        confirmButtonColor: '#3085d6'
      });
  @endif
</script>
@endsection