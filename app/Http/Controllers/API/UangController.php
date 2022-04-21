<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Uang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;
use Illuminate\Support\Facades\DB;

class UangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $mit = new Uang();
        $mit->uang_masuk = $request->uang_masuk;
        $mit->uang_keluar = $request->uang_keluar;
        $mit->id_user = $id;
        $mit->save();
        return response()->json([
            "status" => true,
            "message" => "Product created successfully.",
            "data" => $mit
        ]);
        /* return response(['user' => $mit], 201); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Uang::all();
        $transaksi = DB::table('uangs')
            ->join('users', 'uangs.id_user', '=', 'users.id')
            ->select('uangs.uang_masuk', 'uangs.uang_keluar' , 'uangs.id_user','uangs.id' , 'users.name', 'users.email')
            ->get();

        return response()->json([
            'data' => [
                "status" => true,
                "message" => "succes",
                "data" =>  $transaksi
                
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* $id = Auth::user()->id; */
        $mit = Uang::find($id);
        $mit->uang_masuk = $request->uang_masuk;
        $mit->uang_keluar = $request->uang_keluar;
        /* $mit->id_user = $id; */
        $mit->save();
        return response()->json([
            "status" => true,
            "message" => "Product created successfully.",
            "data" => $mit
        ]);
        /* return response(['user' => $mit], 201); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
