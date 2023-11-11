<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('depanweb', [
      'title' => 'BINTAN IN HAND',
      'menu_active' => 'menu-home',
      'sub_menu_active' => 'none',
      'page_active' => 'home',
    ]);
  }
  public function privacy()
  {
    return view('privacy', [
      
    ]);
  }
  public function term()
  {
    return view('term', [
      
    ]);
  }
}
