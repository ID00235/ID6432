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


class GenerateController extends Controller
{
    function generateform(){
         $route = array("main"=>"Generate Form","sub"=>"","title"=>"Login","prefix"=>"");
        return view('generate.form',array("route"=>$route));
    }
}
