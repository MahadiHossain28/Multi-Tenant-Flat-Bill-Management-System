<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Flat;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            $building_count = Building::count();
            $house_owner_count = User::role('house_owner')->count();
            $tenant_count = Tenant::count();
            return view('backend.layouts.dashboard', compact('building_count', 'house_owner_count', 'tenant_count'));
        }else{
            $building = Building::where('house_owner_id', auth()->id())->first();
            return view('backend.layouts.dashboard', compact('building'));
        }
    }
}
