<?php
namespace App\Http\Controllers\Desa;

use Illuminate\Http\Request;

use App\Http\Requests;
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

class HomeController extends Controller{

		function index(){
			$route = array("main"=>"home","sub"=>"","title"=>"Beranda");
        	return view('desa.home',array("route"=>$route));
		}
		
}