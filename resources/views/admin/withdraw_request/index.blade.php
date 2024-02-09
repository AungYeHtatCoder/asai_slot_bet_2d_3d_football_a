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
            <h5 class="mb-0">WithDraw Requested Lists</h5>

          </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-flush" id="users-search">
      <thead class="thead-light">
        <th>#</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Requested Amount</th>
        <th>Payment Method</th>
        <th>Bank Account Name</th>
        <th>Bank Account Number</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($withdraws as $withdraw)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>
            <span class="d-block">{{ $withdraw->user->name }}</span>
          </td>
          <td>{{ $withdraw->user->phone }}</td>
          <td>{{ number_format($withdraw->amount) }}</td>
          <td>{{ $withdraw->bank->name }}</td>
          <td>{{$withdraw->account_name}}</td>
          <td>{{$withdraw->account_name}}</td>
          <td>
          <span class="badge text-bg-{{ $withdraw->status == 0 ? 'danger' : 'success' }} text-white mb-2">{{ $withdraw->status == 0 ? "pending" : "done" }}</span>

          </td>

          <td>{{ $withdraw->created_at->format('d-m-Y') }}</td>
          <td>
            @if($withdraw->status == 0 )
            <a href="{{route('admin.agent.withdrawshow',$withdraw->id)}}" class="btn btn-primary" disabled >Update</a>
            @endif
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