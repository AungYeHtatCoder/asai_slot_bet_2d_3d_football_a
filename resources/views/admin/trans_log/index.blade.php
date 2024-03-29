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
      <h5 class="mb-0">Transfer Log</h5>

     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1 " data-type="csv" type="button"
        name="button">Export</button>
      </div>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-flush" id="users-search">
     <thead class="thead-light">

        <tr>
            <th>#</th>
            <th>Date</th>
            <th>From User</th>
            <th>To User</th>
            <th>Cash In</th>
            <th>Cash Out</th>
            <th>Profit</th>
            <th>Note</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transferLogs as $index => $log)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>
                  @php
                    $date = date_create($log->created_at);
                    echo date_format($date,"d/m/Y");
                  @endphp
                </td>
                <td>{{ $log->fromUser->name }}</td>
                <td>{{ $log->toUser->name }}</td>
                <td>{{ $log->cash_in }}</td>
                <td>{{ $log->cash_out }}</td>
                <td>
                  @php

                $profit = $log->cash_in - $log->cash_out;
                  @endphp
                  @if ($profit < 0)
                      <span class="text-danger">{{ $profit }}</span>
                  @else
                      <span class="text-success">{{ $profit }}</span>
                  @endif
                </td>
                <td>{{ $log->note }}</td>
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
