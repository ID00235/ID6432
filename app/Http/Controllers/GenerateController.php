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

    function generateformbaru (Request $request, $table_name){
		$columns = DB::select('show columns from '.$table_name);
		return view('generate.form-baru',array("columns"=>$columns,"table_name"=>$table_name,
			"route"=>$request->input('route')));
	}

	 function generateformedit(Request $request, $table_name){
		$columns = DB::select('show columns from '.$table_name);
		return view('generate.form-edit',array("columns"=>$columns,"table_name"=>$table_name,
			"route"=>$request->input('route')));
	}

	function generateroute(){
		$route = array("main"=>"Generate Route","sub"=>"","title"=>"Login","prefix"=>"");
        return view('generate.route',array("route"=>$route));
	}

	function generateformlist(Request $request){
		$table = $request->input('table');
		$columns = DB::select('show columns from '.$table);
		return view('generate.form-list',array("columns"=>$columns,"table_name"=>$table));
	}

	function generatelist(){
		$route = array("main"=>"Generate List","sub"=>"","title"=>"Login","prefix"=>"");
        return view('generate.list',array("route"=>$route));
	}

	function generaterouteresult (Request $request){
		$route = array("main"=>"Generate Route","sub"=>"","title"=>"Login","prefix"=>"");
        return view('generate.route-result',array("route"=>$route));
	}

	function generatelistsubmit (Request $request){
		
		$field = $request->input('field');
		$tampil = $request->input('tampil');
		$label = $request->input('label');
		$func = $request->input('func');
		$align = $request->input('align');
		$route = $request->input('route');
		$primary = $request->input('primary');

		$tab = "&nbsp;&nbsp;&nbsp;";
		$tab2 = $tab.$tab;
		$tab3 = $tab2.$tab;
		$tab4 = $tab2.$tab3;
		$tab5 = $tab2.$tab4;
		$tab6 = $tab3.$tab5;
		$br = "<br>";

		echo '&#60;table class=&#34;table table-striped table-bordered table-sm&#34;&#62;'.'<br>';
		echo $tab2.'&#60;thead&#62;'.'<br>';
		echo $tab2.$tab2.'&#60;tr&#62;'.'<br>';
		echo $tab4.'&#60;th&#62;&#60;&#47;th&#62;'.$br;
		echo $tab4.'&#60;th&#62;No&#60;&#47;th&#62;'.$br;
		for($i = 0 ; $i< count($tampil);$i++){
			echo $tab4.'&#60;th&#62;'.$label[$tampil[$i]].'&#60;&#47;th&#62;'.$br;
		}
		echo $tab2.$tab2.'&#60;&#47;tr&#62;'.$br;
		echo $tab2. '&#60;&#47;thead&#62;'. $br;
		echo $tab2.'&#60;tbody&#62;'.$br;
		echo $tab2.'&#60;?php &#36;no = 1;&#36;tahun = 0;?&#62;'.$br;
		echo $tab2.'@foreach(&#36;data as &#36;d)'.$br;
		echo $tab4.'@if(tahunSystem(&#36;d-&#62;tanggal)!=&#36;tahun)
			          &#60;?php &#36;tahun = tahunSystem(&#36;d-&#62;tanggal);?&#62;
			          &#60;tr&#62;&#60;td colspan="'.(count($tampil) + 2).'"&#62;&#60;b&#62;Set Data Tahun &#123;&#123;&#36;tahun&#125;&#125;&#60;&#47;b&#62;&#60;&#47;td&#62;&#60;&#47;tr&#62;
			        @endif'.$br;
		echo  $tab4.'&#60;tr&#62;'.$br;
		echo  $tab5.'&#60;td align="'."center".'"&#62;'.$br;
		echo  $tab6.'&#60;a href="&#123;&#123;URLGroup("'.$route.'/edit")&#125;&#125;&#47;&#123;&#123;Hashids::encode(&#36;d-&#62;'.$primary.')&#125;&#125;"&#62;Edit&#60;&#47;a&#62;'.$br;
		echo $tab5.'&#60;&#47;td&#62;'.$br;
		echo $tab5.'&#60;td align="center"&#62;&#123;&#123;&#36;no&#125;&#125;&#60;&#47;td&#62;'.$br;
		for($i = 0 ; $i< count($tampil);$i++){
			$alg = $align[$tampil[$i]]=="-"?"":" align=\"".$align[$tampil[$i]]."\"";
			$fu = $func[$tampil[$i]]=="-"?"":$func[$tampil[$i]];
			$fi = $field[$tampil[$i]];
			echo $tab5.'&#60;td'.$alg.'&#62;&#123;&#123;'.$fu.'(&#36;d-&#62;'.$fi.')&#125;&#125;&#60;&#47;td&#62;'.$br;
		}
		echo  $tab4.'&#60;/tr&#62;'.$br;
		echo $tab4.'&#60;?php &#36;no++;?&#62;'.$br;
		echo $tab3.'@endforeach'.$br;
		echo $tab3.'@if(count(&#36;data)==0)
			      &#60;tr&#62;
			        &#60;td colspan="'.(count($tampil) + 2).'"&#62;Tidak Ada Data Untuk Ditampilkan!&#60;&#47;td&#62;
			      &#60;&#47;tr&#62;
			    @endif'.$br;
		echo $tab2.'&#60;&#47;tbody&#62;' .$br;
		echo  '&#60;&#47;table&#62;' .$br;
	}


}
