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

<div class="row mt-4">
  <div class="col-lg-12">
    <div class="card">
      <!-- Card header -->
      
      <div class="card-body">
        <form action="{{ route('admin.agent.statusChange',$withdraw->id) }}" method="POST">
          @csrf
          <div class="row">
          <input type="text" class="form-control" name="player" value="{{ $withdraw->user->id }}" readonly>

            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="name" value="{{ $withdraw->user->name }}" readonly>

              </div>
              @error('name')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $withdraw->user->phone }}" readonly>

              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Bank Account Name</label>
                <input type="text" class="form-control" name="account_name" value="{{ $withdraw->account_name }}" readonly>

              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Bank Account No</label>
                <input type="text" class="form-control" name="account_no" value="{{ $withdraw->account_no }}" readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Payment Method</label>
                <input type="text" class="form-control" name="" value="{{ $withdraw->bank->name }}" readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" value="{{ $withdraw->amount }}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <select name="status" id="" class="form-control">
                <option value="0" {{ $withdraw->status == 0 ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $withdraw->status == 1 ? 'selected' : '' }}>Approved</option>
                <option value="2" {{ $withdraw->status == 2 ? 'selected' : '' }}>Rejected</option>

                </select>
                @error('status')
              <span class="d-block text-danger">*{{ $message }}</span>
              @enderror
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="input-group input-group-outline is-valid my-3">
                <button type="submit" class="btn btn-primary">Player ထံမှ ငွေထုတ်ယူမည်</button>
              </div>
            </div>
          </div>
        </form>
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