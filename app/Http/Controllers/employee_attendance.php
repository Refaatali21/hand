<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee_attendanc;
use App\Models\Employees;
use App\Http\Requests\attendance;

class employee_attendance extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = employee_attendanc::all();
        $employees = Employees::get();
        return view('employeedismissal' , ['attendance' => $attendance],['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(attendance $request)
    {
        try {

            $validated = request('validated');

            $attendanc = new employee_attendanc();
            $attendanc->employee_id  = request('employee_id');
            $attendanc->date         = request('date');
            $attendanc->start_date   = request('start_date');
            $attendanc->end_date     = request('end_date');
            $attendanc->duration     = request('duration');
            $attendanc->reason       = request('reason');
            $attendanc->save();
            return redirect('attendance')->with($validated);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(attendance $request, string $id)
    {
        try {
            $validated = request('validated');
            $attendanc = employee_attendanc::findOrFail(request('id'));
            $attendanc->update([
            'employee_id'  => request('employee_id'),
            'date'         => request('date'),
            'start_date'   => request('start_date'),
            'end_date'     => request('end_date'),
            'duration'     => request('duration'),
            'reason'       => request('reason'),
            ]);
            return redirect('attendance')->with($validated);
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        try {
            employee_attendanc::findOrFail(request('id'))->forceDelete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
