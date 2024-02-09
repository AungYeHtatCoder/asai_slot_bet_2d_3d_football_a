<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    Material Dashboard 2 PRO by Creative Tim
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin_app/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin_app/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="{{ asset('admin_app/assets/css/material-dashboard.css?v=3.0.6')}}" rel="stylesheet" /> -->
  <link href="https://demos.creative-tim.com/test/material-dashboard-pro/assets/css/material-dashboard.min.css?v=1.0.0" rel="stylesheet">

  <script defer data-site="https://delightmyanmar.online" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <h5 class="mb-0">WinLost Detail Report</h5>
              <form action="{{route('admin.report.detail')}}" method="GET">
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group input-group-static my-3">
                      <label>Game</label>
                      <input type="text" class="form-control" id="" value="{{$provider->description}}" name="description" readonly>
                      <input type="hidden" value="{{$provider->p_code}}" name="provider">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group input-group-static my-3">
                      <label>Player</label>
                      <input type="text" class="form-control" id="" value="{{$player}}"  name="player_name" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group input-group-static my-3">
                      <label>From</label>
                      <input type="date" class="form-control" id="fromDate" name = "fromDate">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group input-group-static my-3">
                      <label>To</label>
                      <input type="date" class="form-control" id="to" name="toDate">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                  </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bet Time</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Result Time</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Game ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Game Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bet</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payout</th>

                    @if($provider->p_code == 'JD' || $provider->p_code == 'PG' )
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Befor Bal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">After Bal</th>
                    @endif
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Win/Lose</th>

                  </tr>
                </thead>
                <tbody>
                  @if(count($results)>0)
                  @foreach ($results as $detail)

                  <tr>
                    <td class="text-sm font-weight-normal">{{$detail->start_time}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->end_time}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->gameList->game_id}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->gameList->name_en}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->bet}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->turnover}}</td>
                    <td class="text-sm font-weight-normal">{{$detail->payout}}</td>

                    @if ($detail->p_code == 'PG')
                    
                    <td class="text-sm font-weight-normal">{{ WinLose::getBeforBal($detail->bet_detail); }}</td>
                    <td class="text-sm font-weight-normal">{{ WinLose::getBeforBal($detail->bet_detail); }}</td>
                    @endif

                    @if($detail->bet < $detail->payout)
                      <td class="text-success">{{$detail->payout - $detail->bet}}</td>
                      @else
                      <td class="text-danger">-{{$detail->bet - $detail->payout}}</td>
                      @endif
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
  <script src="{{ asset('admin_app/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <!-- Kanban scripts -->
  <script src="{{ asset('admin_app/assets/js/plugins/dragula/dragula.min.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/jkanban/jkanban.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/world.js')}}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('admin_app/assets/js/plugins/datatables.js') }}"></script>

  <script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
      searchable: false,
      fixedHeight: true
    });

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>


</body>

</html>