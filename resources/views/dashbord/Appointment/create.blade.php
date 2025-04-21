@extends("dashbord.masterpage")

@section('content')
<div class="container">
    <h1 class="my-4">Add New Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        <!-- User ID Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Service ID Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>

        <!-- Appointment Date Field -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <select id="service" name="service" required>
                <option value="haircut">Haircut</option>
                <option value="beard-trim">Beard Trim</option>
                <option value="shave">Shave</option>
                <option value="haircut-beard">Haircut & Beard Trim</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Appointment Date:</label>
            <input type="datetime-local" name="date" id="date" class="form-control" required>
        </div>

         <div class="mb-3">
            <label for="time" class="form-label">Appointment time:</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>

        {{-- <!-- Status Field (Dropdown Selector) -->
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Confirmed">Confirmed</option>
                <option value="In Progress">In Progress</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div> --}}

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
