<?php

namespace App\Http\Controllers;

use App\Models\Hightlight;
use Illuminate\Http\Request;

class UmatController extends Controller
{
    public function highlight(){
        $highlight=Hightlight::get();
        // dd($highlight);
        return view('admin.viewPage.landingpage.highlight', compact('highlight'));
    }

}
