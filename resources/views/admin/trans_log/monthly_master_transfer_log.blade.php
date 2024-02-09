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
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card  mb-2 p-3">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Monthly Total Cash In</p>
                    <h4 class="mb-0">{{ $totalCashIn }} MMK</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
              <div class="card  mb-2 p-3">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">leaderboard</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Monthly Total Cash Out </p>
                    <h4 class="mb-0">{{ $totalCashOut }} MMK</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p> --}}
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
              <div class="card  mb-2 p-3">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">leaderboard</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Monthly Total Profit </p>
                    <h4 class="mb-0">
                     @php
                     $totalProfit = $totalCashIn - $totalCashOut;
                     @endphp
                    {{-- if totalProfit <0 , red color. else green color --}}
                    @if($totalProfit < 0)
                    <span class="text-danger">{{ $totalProfit }} MMK</span>
                    @else
                    <span class="text-success">{{ $totalProfit }} MMK</span>
                    @endif

                    </h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p> --}}
                </div>
              </div>
            </div>

          </div>
<div class="row mt-4">
 <div class="col-12">
  <div class="card">
   <!-- Card header -->
   <div class="card-header pb-0">
    <div class="d-lg-flex">
     <div>
      <h5 class="mb-0">Master To Agent Monthly Status Dashboards</h5>

     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       <a href="#" class="btn bg-gradient-primary btn-sm mb-0 py-2"></a>
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
           <tr>
                <th>Date</th>
                <th>From User ID</th>
                <th>To User ID</th>
                <th>Cash In</th>
                <th>Cash Out</th>
                <!-- Add more columns as needed -->
            </tr>
        </tr>
    </thead>
    <tbody>
         @foreach($transferLogs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d-m-Y') }}</td>
                    <td>{{ $log->fromUser->name }}</td>
                    <td>{{ $log->toUser->name }}</td>
                    <td>{{ $log->cash_in }}</td>
                    <td>{{ $log->cash_out }}</td>
                    <!-- Add more columns as needed -->
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
