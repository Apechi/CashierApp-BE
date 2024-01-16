<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employee = Employee::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $employee
                ]
            );

            return $json;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            

            $validate = $request->validated();

           

            $employee = Employee::create($validate);

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $employee
                ]
            );

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        try {
            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $employee
                ]
            );
    
            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $validate = $request->validated();

            $employee->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $employee
            ]);

            return $json;

        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$employee->nama} Telah di hapus"
            ]);

            return $json;

        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function error($th)
    {
        $json = response()->json(
            [
                'status' => 500,
                'data' => $th->getMessage()
            ],
            500
        );

        return $json;
    }
}
