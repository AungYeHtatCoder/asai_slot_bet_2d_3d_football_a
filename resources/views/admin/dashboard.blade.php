@extends('admin_layouts.app')

@section('content')

<div class="row">
    @if($user->hasRole('Owner'))
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col text-start">
                        <p class="text-sm mb-1 text-capitalize font-weight-bold">Provider Balance</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{ number_format($balance['data']) }}
                        </h5>
                        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0"> <span class="font-weight-normal text-secondary">latest update</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col text-start">
                        @if($user->hasRole('Owner'))
                        <p class="text-sm mb-1 text-capitalize font-weight-bold">Agent</p>
                        @elseif($user->hasRole('Agent'))
                        <p class="text-sm mb-1 text-capitalize font-weight-bold">Player</p>
                        @endif
                        <h5 class="font-weight-bolder mb-0">
                            {{$userCount}}
                        </h5>
                        @if($percentageUserCount > 0)
                        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+{{floor($percentageUserCount)}}% <span class="font-weight-normal text-secondary">since last month</span></span>
                        @else
                        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">{{floor($percentageUserCount)}}% <span class="font-weight-normal text-secondary">since last month</span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col text-start">
                        <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Today Deposit</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{$dailyDeposit->cash_in ?? 0}}
                        </h5>
                        @if ($percentageDeposit > 0)
                        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+{{floor($percentageDeposit)}}%
                        <span class="font-weight-normal text-secondary">since yesterday</span></span>
                        @else
                        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">{{floor($percentageDeposit)}}%
                        <span class="font-weight-normal text-secondary">since yesterday</span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col text-start">
                        <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Today WithDraw</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{$dailyWithdraw->cash_out ?? 0}}
                        </h5>
                        @if($percentageWithdraw > 0)
                        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+{{floor($percentageWithdraw)}}%
                        <span class="font-weight-normal text-secondary">since yesterday</span></span>
                        @else
                        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">{{floor($percentageWithdraw)}}%
                        <span class="font-weight-normal text-secondary">since yesterday</span></span>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



</div>
<div class="row mt-4">
    <div class="col-lg-4 col-sm-6">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Last 10 Days Transaction Report</h6>
                    <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title data-bs-original-title="See traffic channels">
                        <i class="material-icons text-sm">priority_high</i>
                    </button>
                </div>
            </div>
            <div class="card-body pb-0 p-3 mt-4">
                <div class="row">
                    <div class="col-7 text-start">
                        <div class="chart">
                            <canvas id="chart-pie" class="chart-canvas" height="200"></canvas>
                        </div>
                    </div>
                    <div class="col-5 my-auto">
                        <span class="badge badge-md badge-dot me-4 d-block text-start">
                            <i class="bg-info"></i>
                            <span class="text-dark text-xs">Deposit</span>
                        </span>
                        <span class="badge badge-md badge-dot me-4 d-block text-start">
                            <i class="bg-primary"></i>
                            <span class="text-dark text-xs">Withdraw</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0 pb-0 p-3 d-flex align-items-center">
                <div class="w-60">
                    <p class="text-sm">
                        More than <b>1,200,000</b> sales are made using referral marketing, and <b>700,000</b> are from social media.
                    </p>
                </div>
                <div class="w-40 text-end">
                    <a class="btn bg-light mb-0 text-end" href="javascript:;">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-sm-6 mt-sm-0 mt-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Last 10 Days Win/Lose Report</h6>
                    <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="See which ads perform better">
                        <i class="material-icons text-sm">priority_high</i>
                    </button>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-primary"></i>
                        <span class="text-dark text-xs">Bet</span>
                    </span>
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-dark"></i>
                        <span class="text-dark text-xs">Payout</span>
                    </span>
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-info"></i>
                        <span class="text-dark text-xs">Win/Lose</span>
                    </span>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@can('admin_access')
<div class="row gx-4 mt-4">
    <div class="col-md-6">
        <div class="card">
            <form action="{{route('admin.balanceUp')}}" method="post">
                @csrf
                <div class="card-header p-3 pb-0">
                    <h6 class="mb-1">Update Balance</h6>
                    <p class="text-sm mb-0">
                        Owner can update balance.
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="input-group input-group-static my-4">
                        <label>Amount</label>
                        <input type="integer" class="form-control" name="balance">
                    </div>

                    <button class="btn bg-gradient-dark mb-0 float-end">Update </button>
                </div>
            </form>
        </div>
    </div>
    @endcan
    @endsection
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/chartjs.min.js"></script>
    <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        var errorMessage = @json(session('error'));
        var successMessage = @json(session('success'));

        console.log(successMessage);
    </script>
    <script>
        @if(session() -> has('success'))
        Swal.fire({
            icon: 'success',
            title: successMessage,
            showConfirmButton: false,
            timer: 1500
        })
        @elseif(session() -> has('error'))
        Swal.fire({
            icon: 'error',
            title: errorMessage,
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    </script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var ctx2 = document.getElementById("chart-pie").getContext("2d");
        var labels = [];
        var totalBets = [];
        var totalPayouts = [];
        var totalReport = [];

    @foreach($report as $data)
        labels.push("{{$data->date}}");
        totalBets.push("{{$data->total_bet}}");
        totalPayouts.push("{{$data->total_payout}}");
        totalReport.push("{{$data->total_payout - $data->total_bet}}");
    @endforeach
   
        // Line chart
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                        label: "Bet",
                        tension: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#e91e63",
                        pointBorderColor: "transparent",
                        borderColor: "#e91e63",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: totalBets,
                        maxBarThickness: 6
                    },
                    {
                        label: "Payout",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#3A416F",
                        pointBorderColor: "transparent",
                        borderColor: "#3A416F",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: totalPayouts,
                        maxBarThickness: 6
                    },
                    {
                        label: "Win/Lose",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#17c1e8",
                        pointBorderColor: "transparent",
                        borderColor: "#17c1e8",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: totalReport,
                        maxBarThickness: 6
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#c1c4ce5c'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#9ca2b7',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            borderDash: [5, 5],
                            color: '#c1c4ce5c'
                        },
                        ticks: {
                            display: true,
                            color: '#9ca2b7',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        // Pie chart
        new Chart(ctx2, {
            type: "pie",
            data: {
                labels: ['Deposit', 'Withdraw'],
                datasets: [{
                    label: "Transaction",
                    weight: 9,
                    cutout: 0,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 1,
                    backgroundColor: ['#17c1e8', '#e91e63'],
                    data: [{{$lastDeposit->cash_in  }},{{$lastWithdraw->cash_out}}],
                    fill: false
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            color: '#c1c4ce5c'
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            color: '#c1c4ce5c'
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });
    </script>
    @endsection