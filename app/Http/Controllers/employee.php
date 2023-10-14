<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Http\Requests\create;
use Illuminate\Http\RedirectResponse;

class employee extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        return view('index' , ['employees' => $employees]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(create $request) : RedirectResponse
    {
        try {

            $validated = request('validated');

            $employees = new Employees();
            $employees->name          = request('name');
            $employees->email         = request('email');
            $employees->phone         = request('phone');
            $employees->address       = request('address');
            $employees->Gender        = request('Gender');
            $employees->status        = request('status');
            $employees->job_title     = request('job_title');
            $employees->hire_date     = request('hire_date');
            $employees->date_of_birth = request('date_of_birth');
            $employees->salary        = request('salary');
            $employees->save();
            return redirect('index')->with($validated);
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, create $request) : RedirectResponse
    {
        try {
            $validated = request('validated');
            $employees = Employees::findOrFail(request('id'));
            $employees->update([
            'name'          => request('name'),
            'email'         => request('email'),
            'phone'         => request('phone'),
            'address'       => request('address'),
            'Gender'        => request('Gender'),
            'status'        => request('status'),
            'job_title'     => request('job_title'),
            'hire_date'     => request('hire_date'),
            'date_of_birth' => request('date_of_birth'),
            'salary'        => request('salary'),
            ]);
            return redirect('index')->with($validated);
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trached(Request $request) : RedirectResponse
    {
            try {$id = $request->id;
                $employees = Employees::where('id' , $id)->first();
                $employees->delete();
                return redirect('index');
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
    }

    public function destroy()
    {
            try {
                Employees::findOrFail(request('id'))->forceDelete();
                return redirect()->back();
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
    }
}


