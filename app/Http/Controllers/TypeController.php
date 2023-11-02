<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $type = Type::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $type
                ]
            );

            return $json;
        } catch (\Throwable $th) {

            $json = response()->json(
                [
                    'status' => 500,
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {

        try {
            $validate = $request->validated();


            $type = Type::create($validate);


            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $type
                ]
            );

            return $json;
        } catch (\Throwable $th) {

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

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        try {

            $json = response()->json([
                'status' => 200,
                'data' => $type
            ]);

            return $json;
        } catch (\Throwable $th) {

            $this->error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        try {
            $validate = $request->validated();

            $type->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $type
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {

            $type->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$type->nama_jenis} Telah di hapus"
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
