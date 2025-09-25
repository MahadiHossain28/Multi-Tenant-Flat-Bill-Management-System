<?php

namespace App\Models;

use App\Observers\TenantObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

#[ObservedBy(TenantObserver::class)]
class Tenant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'contact',
        'assigned_house_owner_id',
        'assigned_building_id',
        'assigned_flat_id',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('house_owner', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->hasRole('house_owner')) {
                $builder->where('assigned_house_owner_id', $user->id);
            }
        });
    }

    public function houseOwner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_house_owner_id');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'assigned_building_id');
    }

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class, 'assigned_flat_id');
    }

    //    public function payments()
    //    {
    //        return $this->hasMany(Payment::class, 'paid_by_tenant_id');
    //    }
}
