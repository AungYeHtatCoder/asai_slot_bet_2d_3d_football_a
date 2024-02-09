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
</style>
@endsection
@section('content')
<div class="row mt-4">
 <div class="col-12">
  <div class="card">
   <!-- Card header -->
   <div class="card-header pb-0">
    <div class="d-lg-flex">
     <div>
      <h5 class="mb-0">Permission Dashboards</h5>
      {{-- <p class="text-sm mb-0">
                    A lightweight, extendable, dependency-free javascript HTML table plugin.
                  </p> --}}
     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       {{-- <a href="" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Product</a> --}}
       <button type="button" class="btn btn-outline-primary btn-sm mb-0 py-2" data-bs-toggle="modal"
        data-bs-target="#import">
        +&nbsp; New Permission
       </button>
       <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mt-lg-10">
         <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="ModalLabel">Create New Permission</h5>
           <i class="material-icons ms-3">file_upload</i>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <p>You can create new permission for all users.</p>
           <form class="multisteps-form__form" action="{{ route('admin.permissions.store') }}" method="post">
            @csrf
            <div class="input-group input-group-dynamic mb-3">
             <label class="form-label">Permission Name</label>
             <input type="text" class="form-control" name="title" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="modal-footer">
             <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn bg-gradient-primary btn-sm">Save Permission</button>
            </div>
           </form>

          </div>

         </div>
        </div>
       </div>
       <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1 py-2" data-type="csv" type="button"
        name="button">Export</button>
      </div>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-flush" id="permission-search">
     <thead class="thead-light">
      <tr>
       <th>#</th>
       <th>Permission Name</th>
       <th>Created At</th>
       <th>Updated At</th>
       <th>Action</th>
      </tr>
     </thead>
     <tbody>
      @foreach($permissions as $key => $permission)
      <tr>
       <td class="text-sm font-weight-normal">{{ ++$key }}</td>
       <td class="text-sm font-weight-normal">{{ $permission->title }}</td>
       <td class="text-sm font-weight-normal">{{ $permission->created_at->format('F j, Y') }}</td>
       <td class="text-sm font-weight-normal">{{ $permission->updated_at->format('F j, Y') }}</td>
       <td>
        <a href="{{ route('admin.permissions.edit', $permission->id) }}" data-bs-toggle="tooltip"
         data-bs-original-title="Edit Permission"><i
          class="material-icons-round text-secondary position-relative text-lg">mode_edit</i></a>
        <a href="{{ route('admin.permissions.show', $permission->id) }}" data-bs-toggle="tooltip"
         data-bs-original-title="Preview Permission Detail">
         <i class="material-icons text-secondary position-relative text-lg">visibility</i>
        </a>
       </td>
      </tr>
      @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin_app/assets/js/plugins/datatables.js') }}"></script>
{{-- <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script> --}}
<script>
if (document.getElementById('permission-search')) {
 const dataTableSearch = new simpleDatatables.DataTable("#permission-search", {
  searchable: true,
  fixedHeight: false,
  perPage: 7
 });

 document.querySelectorAll(".export").forEach(function(el) {
  el.addEventListener("click", function(e) {
   var type = el.dataset.type;

   var data = {
    type: type,
    filename: "material-" + type,
   };

   if (type === "csv") {
    data.columnDelimiter = "|";
   }

   dataTableSearch.export(data);
  });
 });
};
</script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
 return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

@endsection
