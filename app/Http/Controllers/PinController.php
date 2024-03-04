<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinController extends Controller
{
    public function getdatapin(Request $request, $id)
    {
        $dataUser   = User::where('id', $id)->first();
        $dataJumlahFollower = DB::select('SELECT COUNT(id_user) as jmlfollower FROM follows where id_follow =' . $id);
        $dataJumlahFollow   = DB::select('SELECT COUNT(id_follow) as jmlfollow FROM follows where id_user =' . $id);
        $dataFollow = Follow::where('id_follow', $id)->where('id_user', auth()->user()->id)->first();
        return response()->json([
            'dataUser'  => $dataUser,
            'jumlahFollower'    => $dataJumlahFollower,
            'jumlahFollow'    => $dataJumlahFollow,
            'dataUserActive'    => auth()->user()->id,
            'dataFollow'    => $dataFollow
        ], 200);
    }
     //upload foto
     public function post(Request $request) {
        // Check if a file has been uploaded
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Generate a unique filename
            $namafoto = 'postingan' . time() . '.' . $file->getClientOriginalExtension();
    
            // Move the file to the 'assets' directory
            $file->move('assets', $namafoto);
    
            // Save the data to the database
            $datasimpan = [
                'id_user' => auth()->user()->id,
                'judul_foto' => $request->judul_foto,
                'deskripsi_foto' => $request->deskripsifoto,
                'album_id' => $request->album,
                'url' => $namafoto,
            ];
    
            Foto::create($datasimpan);
    
            return redirect('/explore');
        } else {
            return redirect()->back()->with('error', 'No file uploaded');
        }
    }
}
