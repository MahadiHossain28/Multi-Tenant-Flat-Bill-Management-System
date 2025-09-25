<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $building = Building::where('house_owner_id', auth()->id())->first();
        return view('backend.layouts.dashboard', compact('building'));
    }
}
