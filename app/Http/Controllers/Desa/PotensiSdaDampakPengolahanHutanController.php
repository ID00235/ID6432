<?php
namespace App\Http\Controllers\Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use URL;
use DB;
use Validator;
use Yajra\Datatables\Datatables;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Vinkla\Hashids\Facades\Hashids;
use App\User;
//model (table) yang digunakan
use App\Models\DampakPengolahanHutan;
class PotensiSdaDampakPengolahanHutanController extends Controller{


function listDampakPengolahanHutan(){
		$id_desa = Auth::user()->userdesa();
        $data    = DampakPengolahanHutan::where('id_desa', $id_desa)->orderby('tanggal', 'desc')->get();
        $route   = array("main" => "potensi", "sub" => "sda", "title" => "Potensi - Dampak Pengolahan Hutan");
        return view('desa.potensi.list-dampak-hutan', array("route" => $route, "data" => $data));
}

function newDampakPengolahanHutan(){

}

function insertDampakPengolahanHutan(Request $request){

}

function updateDampakPengolahanHutan(Request $request){

}

function deleteDampakPengolahanHutan(Request $request){

}

}
