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
      <h5 class="mb-0">Game Type & Provider Dashboards</h5>

     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       {{-- <a href="" class="btn bg-gradient-primary btn-sm mb-0 py-2">+&nbsp; Create New
        User</a> --}}
       <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1 " data-type="csv" type="button"
        name="button">Export</button>
      </div>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    @can('admin_access')
    <table class="table table-flush" id="users-search">
    <thead class="thead-light">
        <tr>
        <th class="bg-primary text-white">GameTypeID</th>
        <th class="bg-success text-white">GameTypeCode</th>
        <th class="bg-info text-white">GameTypeDesc</th>
        <th class="bg-warning text-white">ProviderID</th>
        <th class="bg-danger text-white">ProviderCode</th>
        <th class="bg-secondary text-white">ProviderDesc</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gameTypes as $gameType)
            @foreach($gameType->providers as $provider)
                <tr>
                    {{-- <td>{{ $loop->parent->iteration }}</td> --}}
                    <td>{{ $gameType->id }}</td>
                    <td>{{ $gameType->code }}</td>
                    <td>{{ $gameType->description }}</td>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->p_code }}</td>
                    <td>{{ $provider->description }}</td>
                </tr>
            @endforeach
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
