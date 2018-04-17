<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use App\Models\Admin;


class WelcomeController extends Controller
{
    public function index ()
    {
        $admin = Admin::first();
        return $this->display('welcome');
    }

}