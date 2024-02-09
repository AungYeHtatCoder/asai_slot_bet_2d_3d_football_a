@extends('admin_layouts.app')
@section('styles')
<style>
.transparent-btn {
 background: none;
 border: none;
 padding: 0;
 outline: none;
 cursor: pointer;
 box-shadow: none;
 appearance: none;
 /* For some browsers */
}


.custom-form-group {
 margin-bottom: 20px;
}

.custom-form-group label {
 display: block;
 margin-bottom: 5px;
 font-weight: bold;
 color: #555;
}

.custom-form-group input,
.custom-form-group select {
 width: 100%;
 padding: 10px 15px;
 border: 1px solid #e1e1e1;
 border-radius: 5px;
 font-size: 16px;
 color: #333;
}

.custom-form-group input:focus,
.custom-form-group select:focus {
 border-color: #d33a9e;
 box-shadow: 0 0 5px rgba(211, 58, 158, 0.5);
}

.submit-btn {
 background-color: #d33a9e;
 color: white;
 border: none;
 padding: 12px 20px;
 border-radius: 5px;
 cursor: pointer;
 font-size: 18px;
 font-weight: bold;
}

.submit-btn:hover {
 background-color: #b8328b;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@1.13.12/iconfont/material-icons.min.css">
@endsection
@section('content')
<div class="row">
 <div class="col-12">
  <div class="container mb-3">
   <a class="btn btn-icon btn-2 btn-primary float-end me-5" href="{{ route('admin.roles.index') }}">
    <span class="btn-inner--icon mt-1"><i class="material-icons">arrow_back</i>Back</span>
   </a>
  </div>
  <div class="container my-auto mt-5">
   <div class="row">
    <div class="col-lg-10 col-md-2 col-12 mx-auto">
     <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
       <div class="bg-gradient-primary shadow-primary border-radius-lg py-2 pe-1">
        <h4 class="text-white font-weight-bolder text-center mb-2">Edit Role</h4>
       </div>
      </div>
      <div class="card-body">
       <form role="form" method="post" class="text-start" action="{{ route('admin.roles.update',$role->id) }}">
        @csrf
        @method('PUT')
        <div class="custom-form-group">
         <label for="title">Role Name</label>
         <input type="text" id="title" name="title" class="form-control" value="{{$role->title}}">
        </div>
        
        <div class="row custom-form-group">
         <div class="col-12">
          <label for="choices-role">Permission</label>
          <select class="form-control" name="permissions[]" id="choices-tags-edit" multiple>
           @foreach ($permissions as  $permission)
           
           <option value="{{ $permission->id }}"
            {{ in_array($permission->id, old('permissions', [])) ||
              (isset($role) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>
            {{ $permission->title }}
           </option>
           @endforeach
          </select>
         </div>
        </div>
        <div class="custom-form-group">
         <button class="btn btn-primary" type="submit">Edit</button>
        </div>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<script src="{{ asset('admin_app/assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/js/plugins/quill.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<script>
if (document.getElementById('choices-tags-edit')) {
 var tags = document.getElementById('choices-tags-edit');
 const examples = new Choices(tags, {
  removeItemButton: true
 });
}
</script>
<script>
if (document.getElementById('choices-roles')) {
 var role = document.getElementById('choices-roles');
 const examples = new Choices(role, {
  removeItemButton: true
 });

 examples.setChoices(
  [{
    value: 'One',
    label: 'Expired',
    disabled: true
   },
   {
    value: 'Two',
    label: 'Out of Role',
    selected: true
   }
  ],
  'value',
  'label',
  false,
 );
}
// store role
$(document).ready(function() {
 $('#submitForm').click(function(e) {
  e.preventDefault();

  $.ajax({
   type: "POST",
   url: "{{ route('admin.roles.store') }}",
   data: $('form').serialize(),
   success: function(response) {
    Swal.fire({
     icon: 'success',
     title: 'Role created successfully',
     showConfirmButton: false,
     timer: 1500
    });
    // Reset the form after successful submission
    $('form')[0].reset();
   },
   error: function(error) {
    console.log(error);
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Something went wrong!'
    });
   }
  });
 });
});
</script>
@endsection
