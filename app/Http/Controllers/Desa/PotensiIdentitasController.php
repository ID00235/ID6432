<?php
namespace App\Http\Controllers\Desa;
use App\Http\Controllers\Desa\BaseController;

class PotensiIdentitasController extends BaseController{

	function index(){
		$route = array("main"=>"potensi","sub"=>"identitas","title"=>"Beranda");
    	return view('desa.potensi.identitas-desa',array("route"=>$route));
	}
		
}