<?php

namespace App\Http\Controllers\Auteur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('auteur.dashboard');
    }
}
