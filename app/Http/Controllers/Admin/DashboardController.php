<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Pesan;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.backend.admin.dashboard.index', [
            'users' => User::count(),
            'admin' => User::where('role', 'Admin')->count(),
            'konselor' => User::where('role', 'Konselor')->count(),
            'remaja' => User::where('role', 'Remaja')->count(),
            'pesan' => Pesan::all()->count(),
        ]);
    }
}
