<?php

namespace App\Observers;

use App\Models\BillCategory;
use App\Models\Building;
use App\Models\Flat;
use Illuminate\Support\Facades\Auth;

class BillCategoryObserver
{
    /**
     * Handle the Flat "creating" event.
     */
    public function creating(BillCategory $billCategory): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $billCategory->building_id = request()->building_id;
            }
        }else{
            $billCategory->building_id = Auth::user()->building->id;
        }
    }

    /**
     * Handle the Flat "updating" event.
     */
    public function updating(BillCategory $billCategory): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $billCategory->building_id = request()->building_id;
            }
        }else{
            $billCategory->building_id = Auth::user()->building->id;
        }
    }

    /**
     * Handle the BillCategory "deleted" event.
     */
    public function deleted(BillCategory $billCategory): void
    {
        //
    }

    /**
     * Handle the BillCategory "restored" event.
     */
    public function restored(BillCategory $billCategory): void
    {
        //
    }

    /**
     * Handle the BillCategory "force deleted" event.
     */
    public function forceDeleted(BillCategory $billCategory): void
    {
        //
    }
}
