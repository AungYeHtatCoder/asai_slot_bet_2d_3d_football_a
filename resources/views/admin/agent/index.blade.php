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
            <h5 class="mb-0">Agent List Dashboards</h5>

          </div>
          <div class="ms-auto my-auto mt-lg-0 mt-4">
            <div class="ms-auto my-auto">
              <a href="{{ route('admin.agent.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Create New
                Agent</a>
              <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-flush" id="users-search">
          <thead class="thead-light">
            <th>#</th>
            <th>UserName</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Balance</th>
            <th>Created_at</th>
            <th>Action</th>
            <th>Transfer</th>
          </thead>
          <tbody>\
            {{-- kzt --}}
            @if(isset($users))
            @if(count($users)>0)
            @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <span class="d-block">{{ $user->name }}</span>

              </td>
              <td>{{ $user->phone }}</td>
              <td>
                <small class="badge badge-{{ $user->status == 0 ? 'success' : 'danger' }}">{{ $user->status == 0 ? "active" : "ban" }}</small>
              </td>
              <td>{{ number_format($user->balance,2) }} MMK</td>

              <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
              <td>
                @if ($user->status == 0)
                <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();" class="me-2" href="#" data-bs-toggle="tooltip" data-bs-original-title="Ban User">
                  <i class="fas fa-user-slash text-danger" style="font-size: 20px;"></i>
                </a>
                @else
                <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();" class="me-2" href="#" data-bs-toggle="tooltip" data-bs-original-title="Active User">
                  <i class="fas fa-user-check text-success" style="font-size: 20px;"></i>
                </a>
                @endif


                <a class="me-1" href="{{ route('admin.agent.edit', $user->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit User">
                  <i class="fas fa-pen-to-square text-info" style="font-size: 20px;"></i>
                </a>
                <a class="me-1" href="{{ route('admin.agent.show', $user->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Preview User Detail">
                  <i class="fas fa-eye text-warning" style="font-size: 20px;"></i>
                </a>
                <form class="d-inline" action="{{ route('admin.agent.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="transparent-btn" data-bs-toggle="tooltip" data-bs-original-title="Delete User">
                    <i class="fas fa-trash text-danger" style="font-size: 20px;"></i>
                  </button>
                </form>
              </td>
              <td>
                <a href="{{ route('admin.agent.getCashIn', $user->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Cash IN To Agent" class="btn btn-info btn-sm">
                  <i class="fas fa-right-left text-white me-1"></i>
                  {{-- <i class="material-icons text-secondary position-relative text-lg" style="font-size: 25px">currency_exchange</i> --}}
                  ငွေလွဲမည်
                </a>
                <a href="{{ route('admin.agent.getCashOut', $user->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Cash Out To Agent" class="btn btn-warning btn-sm">
                  <i class="fas fa-right-left text-white me-1"></i>
                  {{-- <i class="material-icons text-secondary position-relative text-lg" style="font-size: 25px">currency_exchange</i> --}}
                  ငွေထုတ်မည်
                </a>
                <a href="{{ route('admin.agent.getTransferDetail', $user->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Cash Out To Agent" class="btn btn-warning btn-sm">
                  <i class="fas fa-right-left text-white me-1"></i>
                  {{-- <i class="material-icons text-secondary position-relative text-lg" style="font-size: 25px">currency_exchange</i> --}}
                  လွှဲပြောင်းမှတ်တမ်း
                </a>

              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td col-span=8>
                There was no Agents.
              </td>
            </tr>
            @endif
            @endif
            {{-- kzt --}}

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