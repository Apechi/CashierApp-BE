<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $table = Table::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $table
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
    public function store(StoreTableRequest $request)
    {
        try {
            $validate = $request->validated();


            $table = Table::create($validate);


            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $table
                ]
            );
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        try {

            $json = response()->json([
                'status' => 200,
                'data' => $table
            ]);

            return $json;
        } catch (\Throwable $th) {

            $this->error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        try {
            $validate = $request->validated();

            $table->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $table
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        try {

            $table->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$table->nama_menu} Telah di hapus"
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
