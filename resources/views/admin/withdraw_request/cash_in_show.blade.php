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
            <h5 class="mb-0">Cash In Request Detail</h5>

          </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th>UserName</th>
            <td>{{ $cash->user->name }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $cash->phone }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $cash->amount }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $cash->payment_method }}</td>
        </tr>
        <tr>
            <th>နောက်ဆုံးဂဏန်း၆လုံး</th>
            <td>{{ $cash->last_6_num }}</td>
        </tr>
        <tr>
            <th>Payment Receipt</th>
            <td>
                <img src="{{ $cash->img_url }}" class="rounded" width="600px" alt="">
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
              <span class="badge text-white text-bg-{{ $cash->status == 1 ? 'success' : 'danger' }}">{{ $cash->status == 1 ? 'Done' : 'Pending' }}</span>
                
            </td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>
                {{ $cash->created_at->format('d-m-Y') }}
            </td>
        </tr>
    </table>
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