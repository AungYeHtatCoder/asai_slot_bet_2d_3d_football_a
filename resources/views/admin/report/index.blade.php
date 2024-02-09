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
  .active-button {
  background-color: #4CAF50; /* or any color you prefer */
  color: white; /* optional: change text color if needed */
  }
  #search {
    margin-top: 40px;
  }
  #clear {
    margin-top: 40px;
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
            <h5 class="mb-0">Winlose Report</h5>
          </div>
          <div class="ms-auto my-auto mt-lg-0 mt-4">
            <div class="ms-auto my-auto">
              <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
            </div>
          </div>

        </div>
      </div>
      <div class="container">
        <form action="{{route('admin.report.index')}}" method="GET">
          <div class="row">
            <div class="col-md-3">
              <div class="input-group input-group-static my-3">
                <label>From</label>
                <input type="date" class="form-control" id="fromDate" name="fromDate">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group input-group-static my-3">
                <label>To</label>
                <input type="date" class="form-control" id="toDate" name="toDate">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group input-group-static my-3">
                <label>Player</label>
                <input type="text" class="form-control" id="player_name" name="player_name">
              </div>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-sm btn-warning" id="search">Search</button>
            </div>
        </form>
         <div class="col-md-6">
          <button type="button" class="btn btn-sm date-range-button " id="today">Today</button>
          <button type="button" class="btn btn-sm date-range-button" id="yesterday">Yesterday</button>
          <button type="button" class="btn btn-sm date-range-button" id="thisWeek">ThisWeek</button>
          <button type="button" class="btn btn-sm date-range-button" id="thisMonth">ThisMonth</button>
        </div>
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-flush" id="users-search">
        <thead class="thead-light">
          <th>Player Name</th>
          <th>Total Bet</th>
          <th>Total Turnover</th>
          <th>Total Payout</th>
          <th>WinLose</th>
        </thead>
        <tbody>
          {{-- kzt --}}
          @if(isset($bettings))
          @if(count($bettings)>0)
          @foreach ($bettings as $bet)
          <tr>

            <td><a href="{{route('admin.report.providerList',['player_name' => $bet->player_name])}}" class="text-decoration-underline">{{$bet->player_name}}</a></td>
            <td>{{$bet->bet}}</td>
            <td>{{$bet->turnover}}</td>
            <td>{{$bet->payout}}</td>
            @if($bet->bet < $bet->payout)
              <td class="text-success">{{$bet->payout - $bet->bet}}</td>
              @else
              <td class="text-danger">-{{$bet->bet - $bet->payout}}</td>
              @endif
          </tr>
          @endforeach
          @else
          <tr>
            <td col-span=8>
              There was no Players.
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="{{ asset('admin_app/assets/js/button.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

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