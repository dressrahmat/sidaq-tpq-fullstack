<?php

namespace App\Http\Controllers\Dashboard\Pusat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return view('pusat.role.index');
    }
}
