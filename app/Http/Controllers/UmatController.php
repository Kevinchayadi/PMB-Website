<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmatController extends Controller
{
    public function highlight(){
        return view('admin.viewPage.landingpage.highlight');
    }

}
