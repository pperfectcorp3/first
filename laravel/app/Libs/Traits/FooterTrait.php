<?php 

namespace App\Libs\Traits;

use Route;
use Inertia\Inertia;

trait FooterTrait {

	public function getFooter(string $key = ''){
		$footers = [
			'public' => $this->publicFooter(),
	    ];
	    return !empty($key) ? (isset($footers[$key]) ? $footers[$key] : []) : $footers;
	}

	private function publicFooter(){
		return [
		];
	}
}