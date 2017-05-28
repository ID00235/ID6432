<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserRole;
use DB;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey='id_user';
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group(){
        if ($this->usertype=='desa'){
            return 'desa';
        }
        return 'main';
    }

    public function userdesa(){
        $id_user  = $this->id_user;
        $user_role = UserRole::where('id_user',$id_user)->first();
        if($user_role){
            return $user_role->id_desa;
        }
        return 0;
    }

    public function detaildesa(){
        return DB::table('desa')
        ->select(['desa.nama_desa','kecamatan.nama_kecamatan'])
        ->join('kecamatan', 'kecamatan.id_kecamatan','=','desa.id_kecamatan')
        ->where('id_desa',$this->userdesa())
        ->first();
    }
}
