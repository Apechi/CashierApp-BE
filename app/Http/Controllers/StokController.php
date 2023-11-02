<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $stok = Stok::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $stok
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
    public function store(StoreStokRequest $request)
    {
        try {
            $validate = $request->validated();


            $stok = Stok::create($validate);


            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $stok
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
    public function show(Stok $stok)
    {
        try {

            $json = response()->json([
                'status' => 200,
                'data' => $stok
            ]);

            return $json;
        } catch (\Throwable $th) {

            $this->error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        try {
            $validate = $request->validated();

            $stok->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $stok
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        try {

            $stok->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "Data Telah di hapus"
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }
}
