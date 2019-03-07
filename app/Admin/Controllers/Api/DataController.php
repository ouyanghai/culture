<?php
namespace App\Admin\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Dynasty;
use App\Models\AdminUser;
use App\Models\Country;
use App\Models\Religion;

class DataController extends Controller
{
	public function dynasty(){
		return Dynasty::idName();
	}

	public function adminUser(){
		return AdminUser::idName();
	}

	public function country(){
		return Country::idName();
	}

	public function religion(){
		return Religion::idName();
	}
}

?>