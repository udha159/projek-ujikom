<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Follow;
use App\Models\LikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    // public function getData(Request $request)
    // {
    //     $explore = Foto::with(['likefotos', 'favorite'])->withCount(['likefotos', 'comment'])->paginate(4);
    //     return response()->json([
    //         'data'  => $explore,
    //         'statuscode'    => 200,
    //         'idUser'    => auth()->user()->id
    //     ]);
    // }
    public function getData(Request $request) {
        if($request->cari !== 'null'){
            $explore = Foto::with(['likefotos', 'favorite'])->withCount(['likefotos', 'comment'])->where('judul_foto', 'like', '%' .$request->cari. '%')->orderBy('id', 'desc')->paginate(5);
        }else{
            $explore = Foto::with(['likefotos', 'favorite'])->withCount(['likefotos', 'comment'])->orderBy('created_at', 'desc')->paginate(5);

        }
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser' => auth()->user()->id
        ]);
    }

    public function likesfoto(Request $request)
    {
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existingLike = LikeFoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first();
            if (!$existingLike) {
                $dataSimpan = [
                    'id_foto'       => $request->idfoto,
                    'id_user'       => auth()->user()->id
                ];
                LikeFoto::create($dataSimpan);
            } else {
                LikeFoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }

            return response()->json('Data Berhasil Di Simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something went wrong', 500);
        }
    }

    
    public function getdatadetail(Request $request, $id)
    {
        $dataDetailFoto     =  Foto::with('user')->where('id', $id)->first();
        $dataJumlahPengikut = DB::table('follows')->selectRaw('count(id_follow) as jmlfolow')->where('id_follow', $dataDetailFoto->user->id)->first();
        $dataFollow = Follow::where('id_follow', $dataDetailFoto->user->id)->where('id_user', auth()->user()->id)->first();
        return response()->json([
            'dataDetailFoto' => $dataDetailFoto,
            'dataJumlahFollow'  => $dataJumlahPengikut,
            'dataUser'  => auth()->user()->id,
            'dataFollow'    => $dataFollow
        ]);
    }

    public function ambildatakomentar(Request $request, $id)
    {
        $ambilkomentar  = Comment::with('user')->where('id_foto', $id)->get();
        return response()->json([
            'data'  => $ambilkomentar
        ], 200);
    }

    public function kirimkomentar(Request $request)
    {
        try {
            $request->validate([
                'idfoto'    => 'required',
                'isi_komentar'  => 'required'
            ]);
            $dataStoreKoemntar = [
                'id_user'   => auth()->user()->id,
                'id_foto'   => $request->idfoto,
                'isi_komentar'  => $request->isi_komentar
            ];
            Comment::create($dataStoreKoemntar);
            return response()->json([
                'data'      => 'data berhasil disimpan'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('data gagal disimpan', 500);
        }
    }

    public function ikuti(Request $request)
    {
        try {
            $request->validate([
                'idfollow'  => 'required'
            ]);
            $existingFollow = Follow::where('id_user', auth()->user()->id)->where('id_follow', $request->idfollow)->first();
            if (!$existingFollow) {
                $datasimpan = [
                    'id_user'       => auth()->user()->id,
                    'id_follow'     => $request->idfollow
                ];
                Follow::create($datasimpan);
            } else {
                Follow::where('id_user', auth()->user()->id)->where('id_follow', $request->idfollow)->delete();
            }
            return response()->json('Data berhasil eksekusi', 200);
        } catch (\Throwable $th) {
            return response()->json('Data Gagal eksekusi', 500);
            //throw $th;
        }
    }
}
