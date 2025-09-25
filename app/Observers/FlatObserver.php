<?php

namespace App\Observers;

use App\Models\Building;
use App\Models\Flat;
use Illuminate\Support\Facades\Auth;

class FlatObserver
{
    /**
     * Handle the Flat "creating" event.
     */
    public function creating(Flat $flat): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $building = Building::find(request()->building_id);
                $flat->house_owner_id = $building->house_owner_id;
                $flat->building_id = request()->building_id;
            }
        }else{
            $flat->house_owner_id = Auth::id();
            $flat->building_id = Auth::user()->building->id;
        }
    }

    /**
     * Handle the Flat "updating" event.
     */
    public function updating(Flat $flat): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $building = Building::find(request()->building_id);
                $flat->house_owner_id = $building->house_owner_id;
                $flat->building_id = request()->building_id;
            }
        }else{
            $flat->house_owner_id = Auth::id();
            $flat->building_id = Auth::user()->building->id;
        }
    }

    /**
     * Handle the Flat "deleted" event.
     */
    public function deleted(Flat $flat): void
    {
        //
    }

    /**
     * Handle the Flat "restored" event.
     */
    public function restored(Flat $flat): void
    {
        //
    }

    /**
     * Handle the Flat "force deleted" event.
     */
    public function forceDeleted(Flat $flat): void
    {
        //
    }
}
