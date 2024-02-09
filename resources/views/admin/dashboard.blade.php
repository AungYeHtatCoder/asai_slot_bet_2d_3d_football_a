@extends('admin_layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card  mb-2">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">account_balance_wallet</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Balance</p>
                    <h4 class="mb-0">{{ number_format($response->balance) }} </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Latest Update</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card  mb-2">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person_add</i>
                </div>
                <div class="text-end pt-1">
                    @if($response->hasRole('Master'))
                    <p class="text-sm mb-0 text-capitalize">Total Agents</p>
                    @elseif($response->hasRole('Agent'))
                    <p class="text-sm mb-0 text-capitalize">Total Players</p>
                    @else
                    <p class="text-sm mb-0 text-capitalize">Total</p>
                    @endif
                    <h4 class="mb-0">{{$userCount}} </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Latest Update</p>
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
<script>
 
  var errorMessage =  @json(session('error'));
    var successMessage =  @json(session('success'));
  
console.log(successMessage);
</script>
<script>
@if(session()->has('success'))
  Swal.fire({
    icon: 'success',
    title: successMessage,
    showConfirmButton: false,
    timer: 1500
  })
  @elseif(session()->has('error'))
  Swal.fire({
    icon: 'error',
    title: errorMessage,
    showConfirmButton: false,
    timer: 1500
  })
  @endif
</script> 
@endsection