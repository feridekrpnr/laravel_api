<?php

namespace App\Http\Controllers;
use App\Models\Ogun;
use Illuminate\Http\Request;

class DenemeController extends Controller
{
    public function oneri()
    {
      return Ogun::find(1)->onerilerim;
    }
}
