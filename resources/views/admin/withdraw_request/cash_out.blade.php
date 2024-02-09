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


  .custom-form-group {
    margin-bottom: 20px;
  }

  .custom-form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
  }

  .custom-form-group input,
  .custom-form-group select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #e1e1e1;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
  }

  .custom-form-group input:focus,
  .custom-form-group select:focus {
    border-color: #d33a9e;
    box-shadow: 0 0 5px rgba(211, 58, 158, 0.5);
  }

  .submit-btn {
    background-color: #d33a9e;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
  }

  .submit-btn:hover {
    background-color: #b8328b;
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@1.13.12/iconfont/material-icons.min.css">
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="container mt-2">
      <div class="d-flex justify-content-between">
        <h6>Player Information -- <span>
            Player ID : {{ $cash->user->id }}
          </span>
          <span>
            Player Balance :
          </span>
        </h6>
        <a class="btn btn-icon btn-2 btn-primary" href="{{ url('/admin/real-live-master-list') }}">
          <span class="btn-inner--icon mt-1"><i class="material-icons">arrow_back</i>Back</span>
        </a>
      </div>
      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <tbody>
              <tr>
                <th>ID</th>
                <td>{!! $cash->user->id !!}</td>
              </tr>
              <tr>
                <th>User Name</th>
                <td>{!! $cash->user->name ?? "" !!}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>{!! $cash->user->phone !!}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
<div class="row mt-4">
  <div class="col-lg-12">
    <div class="card">
      <!-- Card header -->
      <div class="card-header pb-0">
        <div class="d-lg-flex">
          <div>
            <h5 class="mb-0">{{ $admin->name ?? "" }} ထံမှ ငွေထုတ်ယူမည် ||
              <span>Current Balance - {{ number_format($adminBalance['data'],2)  }} ||
                <span id="current_date">{{ now()}}</span>
              </span>
            </h5>
          </div>

        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.makeCashOut') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="name" value="{{ $cash->user->name }}" readonly>

              </div>
              @error('name')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $cash->user->phone }}" readonly>

              </div>
              @error('phone')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
          </div>
          <input type="hidden" name="from_user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="to_user_id" value="{{ $cash->user_id }}">
        
          <div class="row">
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Admin ထံမှငွေနုတ်ယူမည့်ပမာဏ</label>
                <input type="text" class="form-control" name="amount" required value="{{$cash->amount}}">
              </div>
              @error('cash_out')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <select class="form-control" name="p_code" id="choices-code" required>
                  <option value="">Choose Provider Code</option>
                  @foreach ($providers as  $provider)
                    <option value="{{ $provider->p_code }}" >
                    {{ $provider->p_code }}
                    </option>
                    @endforeach
                  </select>
              </div>
              @error('p_code')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Addition Note (optional)</label>
                <input type="text" class="form-control" name="note">

              </div>
              @error('note')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
          </div>
          {{-- submit button --}}
          <div class="row">
            <div class="col-md-12">
              <div class="input-group input-group-outline is-valid my-3">
                <button type="submit" class="btn btn-primary">Admin ထံမှ ငွေထုတ်ယူမည်</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Admin To Player Transfer History</h4>
      </div>
      <div class="card-body">

        <table class="table">
          <tr>
            <th>#</th>
            <th>RefrenceId</th>
            <th>From</th>
            <th>To</th>
            <th>Cash In</th>
            <th>Cash Out</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
          <tbody>
            @foreach ($transfer_logs as  $log)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$log->refrence_id}}</td>
              <td>{{ $log->fromUser->name }} </td>
              <td>{{ $log->toUser->name }}</td>
              <td>{{$log->cash_in}}</td>
              <td>{{$log->cash_out}}</td>
              <td><small class="badge badge-success">{{$log->status}}</small></td>
              <td>{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<script src="{{ asset('admin_app/assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('admin_app/assets/js/plugins/quill.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var errorMessage =  @json(session('error'));
    var successMessage =  @json(session('success'));
   

    @if(session()->has('success'))
    Swal.fire({
      icon: 'success',
      title: successMessage,
      text: '{{ session('
      SuccessRequest ') }}',
      timer: 3000,
      showConfirmButton: false
    });
    @elseif(session()->has('error'))
    Swal.fire({
      icon: 'error',
      title: '',
      text: errorMessage,
      timer: 3000,
      showConfirmButton: false
    });
    @endif
  });
</script>
@endsection