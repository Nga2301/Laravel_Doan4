<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    protected $folder='frontend.lien_he.';
    public function index(){
       return view($this->folder.'index');
   }
}