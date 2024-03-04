<?php

namespace App\Http\Controllers;
use App\Models\Foto;
use App\Models\User;
use App\Models\album;
use App\Models\LikeFoto;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChangepasswordController extends Controller
{
    public function change(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'old_password' => 'required',
        'new_password' => 'required',
        'confirm_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'kolom tidak boleh kosong'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } else {
            $user = auth()->user();
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error','password lama salah');
            } else {
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return redirect ('/album');
            
            }
            
        
        }
        
        
    }
    public function fotoprofil(Request $request)
    {
        $namafile   = pathinfo($request->file, PATHINFO_FILENAME);
        $extensi    = $request->file->getClientOriginalExtension();
        $namafoto   = 'profile' . time() . '.' . $extensi;
        $request->file->move('pic', $namafoto);
        //data
        $dataupdate = [
            'pictures'  =>$namafoto,
        ];
        //proses update
        User::where('id', auth()->user()->id)->update($dataupdate);
        return redirect('/edit');
    }
     //profil
     public function profile(Request $request)
     {
        $album = album::where('id_user', auth()->user()->id)->get();
        $posts = Foto::where('id_user', auth()->user()->id)->get();
        $name = User::where('id', auth()->user()->id)->get();
        return view('pages.album', compact('name', 'posts', 'album'));

     }
     //updatedataprofile
     public function updatedataprofile(Request $request)
     {
         $dataupdate = [

             'nama_lengkap' =>$request->nama_lengkap,
             'no_telepon'  =>$request->no_telepon,
             'alamat'    =>$request->alamat,
             'jenis_kelamin'    =>$request->jenis_kelamin,
             'bio'   =>$request->bio,
         ];
         ////proses update
         User::where('id', auth()->user()->id)->update($dataupdate);
         return redirect('/profile');
     }
     public function profil_public($id)
     {
         $user = User::find($id);
         return view('pages.profil-public',[
             'nama_lengkap' => $user->nama_lengkap,
             'picture' => $user->picture,
             'user_id'   => $id
         ]);
     }
     //getDataPublic
     public function getdatapublic(Request $request,$id){
         $publicuserid = auth()->user()->id;
         $explore = Foto::with(['likefoto','album   ','users'])->withCount(['likefoto','komenfoto'])->where('users_id', $id)->paginate(4);
         return response()->json([
             'data' => $explore,
             'statuscode' => 200,
             'idUser'    => auth()->user()->id
         ]);
     }
     public function album(Request $request,$id)
    {
        $album = Foto::where('album_id', $id)->get();
        $posts = Foto::where('id_user', auth()->user()->id)->get();
        $name = User::where('id', auth()->user()->id)->get();
        return view('pages.fotoalbum', compact('name', 'posts', 'album'));



    }
    public function post()
    {
        $data_album = album::all();
        return view('pages.pin',compact('data_album'));
    }
 //getDataAlbum
 public function getdataalbum(Request $request){
    $postinganuserid = auth()->user()->id;
    $explore = Foto::with(['likefotos','album','users'])->withCount(['likefotos','comments'])->whereHas('users', function($query) use($postinganuserid){ $query->where('id_user', $postinganuserid);})->where('album_id','!=',null)->paginate(4);
    return response()->json([
        'data' => $explore,
        'statuscode' => 200,
        'idUser'    => auth()->user()->id
    ]);
}
    public function tambahalbum(Request $request)
    {
        //simpan
        $tambahalbum = [
            'id_user' => auth()->User()->id,
            'Nama_Album' => $request->Nama_Album,
            'deskripsi' => $request->deskripsi,
        ];
        album::create($tambahalbum);
        return redirect('/pin');

  }
  public function userlain(Request $request)
  {
    $user = auth()->user();
    return view('pages.profil-public', compact('user'));
  }

  public function editprofil()
    {
        $data = [
            'dataprofile'   => User::where('id', auth()->user()->id)->first()
        ];
        return view('pages.profile', $data);
    }


}