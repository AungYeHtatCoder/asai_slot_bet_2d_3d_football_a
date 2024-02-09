{{-- Inside resources/views/play_slot_game.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Play Slot Game</h1>
    <form action="{{ route('user.play-slot-game') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Play Game</button>
    </form>
</div>
@endsection
