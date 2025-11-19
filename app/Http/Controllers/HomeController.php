<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch counts from database
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();

        // Pass data to view
        return view('home', compact('totalUsers', 'totalProducts', 'totalRoles', 'totalPermissions'));
    }
}
