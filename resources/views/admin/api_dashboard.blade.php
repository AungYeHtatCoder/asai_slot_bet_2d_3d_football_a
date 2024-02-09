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
      <h5 class="mb-0"> API Dashboards</h5>

     </div>
    </div>
   </div>
   <div class="table-responsive">
    @can('admin_access')
    <table class="table table-flush" id="users-search">
    <thead class="thead-light">
        <tr>
        <th class="bg-primary text-white">No</th>
        <th class="bg-primary text-white">GameType</th>
        <th class="bg-success text-white">URL</th>
        <th class="bg-info text-white">User Name</th>
        <th class="bg-warning text-white">Password</th>
        </tr>
    </thead>
    <tbody>
   
        @foreach($apiDashboard as $index => $data)
          
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $index }}</td>
                    <td><a href="{{ $data['url'] }}" target="_" class="text-decoration-underline">Click here</a></td>
                    <td>{{ $data['username'] }}</td>
                    <td>{{ $data['password'] }}</td>
                </tr>
            @endforeach
    </tbody>
</table>
@endcan
   </div>
  </div>
 </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin_app/assets/js/plugins/datatables.js') }}"></script>
<script>
if (document.getElementById('users-search')) {
 const dataTableSearch = new simpleDatatables.DataTable("#users-search", {
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
