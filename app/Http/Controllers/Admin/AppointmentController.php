<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Coach;
use App\Client;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $appointments = Appointment::all();
        // $appointments = DB::table('appointments as a')
        //                     ->leftJoin('users as client', 'client.id', '=', 'a.client_id')
        //                     ->leftJoin('users as coach', 'coach.id', '=', 'a.coach_id')
        //                     ->select(
        //                         'a.id as id',
        //                         'appointment_date',
        //                         'appointment_time',
        //                         'subject',
        //                         'message',
        //                         'place',
        //                         'seen',
        //                         'client.name as client_name',
        //                         'client.lastname as client_lastname',
        //                         'coach.name as coach_name',
        //                         'coach.lastname as coach_lastname'
        //                     )
        //                     ->get();
        return view('admin.pages.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::with('user')->get();
        $coaches = Coach::with('user')->get();
        return view('admin.pages.appointments.create', compact('clients', 'coaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->coach_id = $request->input('coach_id');
        $appointment->appointment_date = $request->input('appointment_date_submit');
        $appointment->appointment_time = $request->input('appointment_time_submit').':00';
        $appointment->place = $request->input('place');
        $appointment->subject = $request->input('subject');
        $appointment->message = $request->input('message');
        $appointment->save();

        $appointment->client()->attach($request->input('clients'));

        \Session::flash('flash_message', 'La cita fue creada con exito.');
		return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {   
        $clients = Client::with('user')->get();
        $coaches = Coach::with('user')->get();
        $assistants = $appointment->client->pluck('id')->toArray();
        return view('admin.pages.appointments.edit', compact('appointment', 'clients', 'coaches', 'assistants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->coach_id = $request->input('coach_id');
        $appointment->appointment_date = $request->input('appointment_date_submit');
        $appointment->appointment_time = $request->input('appointment_time_submit').':00';
        $appointment->place = $request->input('place');
        $appointment->subject = $request->input('subject');
        $appointment->message = $request->input('message');
        $appointment->save();

        $appointment->client()->sync($request->input('clients'));

        \Session::flash('flash_message', 'La cita fue actualizada con exito.');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        \Session::flash('flash_message', 'La cita fue eliminada con exito.');
		return redirect()->back();
    }
}
