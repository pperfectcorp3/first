<?php

namespace App\Libs;

use App\Libs\Traits\MenuTrait;
use App\Libs\Traits\FooterTrait;
use App\Libs\Traits\Helper;
use App\Libs\Traits\Public\Main;

class Plateform {

    use MenuTrait { getMenu as menu; }
    use FooterTrait { getFooter as footer; }
    // use Main { getMain as main; }


}