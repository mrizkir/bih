<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class KontenAdminController extends Controller
{
  public function index()
  {
    return view('admin.dashboard', [
      'title' => 'DASHBOARD',
      'menu_active' => 'menu-home',
      'sub_menu_active' => 'none',
      'page_active' => 'home',
    ]);
  }
}
