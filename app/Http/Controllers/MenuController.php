<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $menu = Menu::with('jenis')->get();

            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $menu->toArray(),

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
    public function store(StoreMenuRequest $request)
    {
        try {
            $validate = $request->validated();


            $menu = Menu::create($validate);


            $json = response()->json(
                [
                    'status' => 200,
                    'data' => $menu
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
    public function show(Menu $menu)
    {
        try {

            $json = response()->json([
                'status' => 200,
                'data' => $menu
            ]);

            return $json;
        } catch (\Throwable $th) {

            $this->error($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            $validate = $request->validated();

            $menu->update($validate);

            $json = response()->json([
                'status' => 200,
                'data' => $menu
            ]);

            return $json;
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {

            $menu->delete();

            $json = response()->json([
                'status' => 200,
                'data' => "{$menu->nama_menu} Telah di hapus"
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
