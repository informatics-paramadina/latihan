<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Latihan;

class LatihanController extends Controller
{
    public function createMhs(Request $request)
    {
        $newMhs = new Latihan;
        $newMhs->nama = $request->nama;
        $newMhs->nim = $request->nim;
        $newMhs->umur = $request->umur;
        $newMhs->save();

        return "OK";
    }

    public function updateMhs(Request $request)
    {
        $newMhs = Latihan::updateOrCreate(
            ['nim' => $request->nim],
            ['nama'=> $request->nama, 'umur' => $request->umur]
        );

        return "OK";
    }

    public function deleteMhs(Request $request)
    {
        $mhs = Latihan::where('nim', $request->nim)->first();
        dd($mhs);
        if($mhs == NULL)
        {
            return "Data tidak ditemukan";
        }
        $mhs->delete();

        return "OK";
    }
}
