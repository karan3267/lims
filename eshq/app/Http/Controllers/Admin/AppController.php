<?php

namespace App\Http\Controllers\Admin;

use App\Models\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AppController extends Controller
{
    public function index()
    {
        $apps = App::all();
        return view('admin.apps.index', compact('apps'));
    }

    public function calibration_index()
    {
        return view('admin.apps.calibration');
    }
}
