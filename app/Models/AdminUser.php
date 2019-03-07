<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    static public function idName(){
    	$res = self::select('id','username')->get();
    	if(empty($res)){
    		return [];
    	}
    	
    	$datas = [];
    	foreach ($res as $value) {
    		$datas[] = ['id'=>$value->id,'text'=>$value->username];
    	}
    	return $datas;
    }
}
