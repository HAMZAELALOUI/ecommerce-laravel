<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneraleSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }
}
