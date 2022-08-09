<?php

namespace App\Http\Controllers\Remaja;

use App\Http\Controllers\Controller;
use App\Models\Balasan;
use App\Models\Content;
use App\Models\Ebook;
use App\Models\Game;
use App\Models\Pesan;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.backend.remaja.dashboard.index', [
            'users' => User::count(),
            'admin' => Content::where('role', 'Admin')->count(),
            'konselor' => Content::where('role', 'Konselor')->count(),
            'remaja' => Content::where('role', 'Remaja')->count(),
            'pesan' => Pesan::where('id_user',Auth::user()->id)->count(),
            'balasan' => Balasan::whereHas('pesan',function($q){
                $q->where('id_user',Auth::user()->id);
            })->count(),
        ]);
    }
}
