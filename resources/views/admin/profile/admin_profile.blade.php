@extends('admin_layouts.app')
@section('content')


<div class="row align-items-center">
    <div class="col-lg-4 col-sm-8">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active  active " data-bs-toggle="tab" href="../../../examples/pages/account/settings.html" role="tab" aria-selected="true">
                        Messages
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
</div>
<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <div class="col-lg-3">
            <div class="card position-sticky top-1">
                <ul class="nav flex-column bg-white border-radius-lg p-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark d-flex" data-scroll href="#profile">
                            <i class="material-icons text-lg me-2">person</i>
                            <span class="text-sm">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll href="#basic-info">
                            <i class="material-icons text-lg me-2">receipt_long</i>
                            <span class="text-sm">Basic Info</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll href="#password">
                            <i class="material-icons text-lg me-2">lock</i>
                            <span class="text-sm">Change Password</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="col-lg-9 mt-lg-0 mt-4">

            <div class="card card-body" id="profile">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{asset('admin_app/assets/img/drake.jpg')}}" alt="bruce" class="w-100 rounded-circle shadow-sm">
                        </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">
                                {{$user->name}}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                           
                                {{$user->roles[0]['title']}}
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                        <label class="form-check-label mb-0">
                            <small id="profileVisibility">
                                Switch to invisible
                            </small>
                        </label>
                        <div class="form-check form-switch ms-2 my-auto">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Basic Info</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{$user->phone}}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Role</label>
                                <input type="text" class="form-control" placeholder="" name="role">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-4" id="password">
                <div class="card-header">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body pt-0">
                <form action="{{ route('admin.profile.updatePassword',$user->id) }}" method="POST">
                @csrf
                    <div class="input-group input-group-outline my-4">
                        <label class="form-label">New password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    @error('password')
                        <span class="d-block text-danger">*{{ $message }}</span>
                    @enderror
                    <div class="input-group input-group-outline">
                        <label class="form-label">Confirm New password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <h5 class="mt-5">Password requirements</h5>
                    <p class="text-muted mb-2">
                        Please follow this guide for a strong password:
                    </p>
                    <ul class="text-muted ps-4 mb-0 float-start">
                        <li>
                            <span class="text-sm">One special characters</span>
                        </li>
                        <li>
                            <span class="text-sm">Min 6 characters</span>
                        </li>
                        <li>
                            <span class="text-sm">One number (2 are recommended)</span>
                        </li>
                        <li>
                            <span class="text-sm">Change it often</span>
                        </li>
                    </ul>
                    <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0" type="submit">Update password</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var errorMessage =  @json(session('error'));
        var successMessage =  @json(session('success'));
        console.log(successMessage);
    @if(session()->has('success'))
    Swal.fire({
      icon: 'success',
      title: successMessage,
      text: '{{ session('
      SuccessRequest ') }}',
      timer: 3000,
      showConfirmButton: false
    });
    @elseif(session()->has('error'))
    Swal.fire({
      icon: 'error',
      title: '',
      text: errorMessage,
      timer: 3000,
      showConfirmButton: false
    });
    @endif
  });

    </script>
    @endsection