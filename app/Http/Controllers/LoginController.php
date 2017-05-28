<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use URL;
use DB;
use Validator;
use Yajra\Datatables\Datatables;
use Crypt;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\UserGroup;
use App\Models\UserRole;
use App\User;


class LoginController extends Controller
{
    

    public function submitlogin(Request $request){

    	$this->validate($request, ['username' => 'required','password'=>'required']);
        
        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('username', $username)->first();

        //jika user tidak ditemukan periksa username sebagai mahasiswa atau bukan
        if (!$user){
           return back()->withErrors(array("login"=>"User ID Tidak Terdaftar!"));
        }        
        if(!$user->aktif){
            return back()->withErrors(array("login"=>"Status USER Tidak Aktif"));
        }
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $page_group = Auth::user()->group();
            if(!$page_group){
                return back()->withErrors(array("login"=>"User ID Tidak Terdaftar!"));
            }else{
                return redirect()->intended($page_group);
            }            
        }else{
            return back()->withErrors(array("login"=>"Username dan Password Salah!"));
        }
    }

    public function login(){
        $route = array("main"=>"Login","sub"=>"","title"=>"Login","prefix"=>"");
        return view('login',array("route"=>$route));
    }

    public function logout(){
        Auth::logout();
        return redirect(URL::to('login'));
    }


}
