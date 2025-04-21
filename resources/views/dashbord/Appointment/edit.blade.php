@extends('dashbord.masterpage')

@section('content')
<div>
    <h1>Edit Appointment</h1>

 <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $appointment->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $appointment->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $appointment->phone }}" required>
        </div>

        <div class="form-group">
            <label for="service">Service</label>
            <input type="text" name="service" class="form-control" value="{{ $appointment->service->name ?? 'N/A' }}" required>
        </div>

        <div class="form-group">
            <label for="date">Appointment Date</label>
            <input type="date" name="date" class="form-control" value="{{ $appointment->date }}" required>
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" value="{{ $appointment->time }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Appointment</button>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

