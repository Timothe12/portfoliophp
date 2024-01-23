<?php

namespace App\Controllers;

use App\Utils\DB;
use App\Utils\View;

class BaseController
{
    public function cv()
    {
        DB::getInstance();
        View::render('cv');
    }
}