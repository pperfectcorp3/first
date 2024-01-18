<?php 

namespace App\Libs\Traits;

use Route;
use Inertia\Inertia;

trait MenuTrait {

	public function getMenu(string $key = ''){
		$menus = [
			'public' => $this->publicMenu(),
	    ];
	    return !empty($key) ? (isset($menus[$key]) ? $menus[$key] : []) : $menus;
	}

	/**
	 * [activePage description]
	 * 
	 * @param  string  $page
	 * @return bool
	 */
	public function activePage(string $page) : bool{
		return true;
	}
	private function publicMenu(){
		return [
		];
	}
}