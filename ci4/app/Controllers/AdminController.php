<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function admin()
    {
        return view('adminview');
    }
    public function adminch()
    {
        return view('adminchart');
    }
}
