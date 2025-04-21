<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;

class BookingController extends Controller{

public function create()
{
    $services =Service::all();
    return view('public.layout.booking', compact('services'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'service' => 'required|exists:services,id',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    Appointment::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'service_id' => $request->service,
        'date' => $request->date,
        'time' => $request->time,
    ]);

    return redirect()->route('booking')->with('success', 'Appointment booked!');
}

}
