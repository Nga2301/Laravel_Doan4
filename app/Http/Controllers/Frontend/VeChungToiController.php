<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VeChungToiController extends Controller
{
    protected $folder='frontend.chung_toi.';
    public function index(){
       return view($this->folder.'index');
   }
}