<?php

namespace App\Observers;

use App\Models\Building;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class TenantObserver
{
    /**
     * Handle the Tenant "creating" event.
     */
    public function creating(Tenant $tenant): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $building = Building::find(request()->building_id);
                $tenant->assigned_house_owner_id = $building->house_owner_id;
            }
        }else{
            $tenant->assigned_house_owner_id = Auth::id();
        }
    }

    /**
     * Handle the Tenant "updating" event.
     */
    public function updating(Tenant $tenant): void
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            if(request()->has('building_id')) {
                $building = Building::find(request()->building_id);
                $tenant->assigned_house_owner_id = $building->house_owner_id;
            }
        }else{
            $tenant->assigned_house_owner_id = Auth::id();
        }
    }

    /**
     * Handle the Tenant "deleted" event.
     */
    public function deleted(Tenant $tenant): void
    {
        //
    }

    /**
     * Handle the Tenant "restored" event.
     */
    public function restored(Tenant $tenant): void
    {
        //
    }

    /**
     * Handle the Tenant "force deleted" event.
     */
    public function forceDeleted(Tenant $tenant): void
    {
        //
    }
}
