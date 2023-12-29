<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $user = User::all();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $user

                ]
            );

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $validate = $request->validated();

            $user = User::create($validate);

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $user
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
    public function update(UpdateUserEditRequest $request, User $user)
    {
        try {


            $validate = $request->validated();

            $user->update($validate);

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $user
                ]
            );

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $user->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$user->name} Telah di hapus"
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
