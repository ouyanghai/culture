<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    static public function idName(){
    	$res = self::select('id','name')->get();
    	if(empty($res)){
    		return [];
    	}
    	
    	$datas = [];
    	foreach ($res as $value) {
    		$datas[] = ['id'=>$value->id,'text'=>$value->name];
    	}
    	return $datas;
    }
}
