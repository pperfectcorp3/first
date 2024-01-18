<?php

namespace App\Libs\Facades;

use Illuminate\Support\Facades\Facade;

class PlateformFacade extends Facade {

	protected static function getFacadeAccessor(){
		
		return 'plateform';

	}

}