<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $cust = Customer::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $cust
                ]
            );

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $validate = $request->validated();


            $cust = Customer::create($validate);


            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $cust
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
    public function show(Customer $customer)
    {
        try {

            $json = response()->json([
                'status' => 200,
                'data' => $customer
            ]);

            return $json;
        } catch (\Throwable $th) {

            $this->error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $validate = $request->validated();

            $customer->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $customer
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {

            $customer->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$customer->nama} Telah di hapus"
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
                'status' => 200,
                'data' => $th->getMessage()
            ],
            500
        );

        return $json;
    }
}
