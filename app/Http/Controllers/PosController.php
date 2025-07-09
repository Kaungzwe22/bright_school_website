<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function admin_print_view(){
        return view("admin.pos.print_view");
    }
    public function admin_invoice_view(){
        return view("admin.pos.pos_view");
    }
}
