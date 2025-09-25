<?php

namespace App\Models;

use App\Observers\FlatObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

#[observedBy(FlatObserver::class)]
class Flat extends Model
{
    protected $fillable = [
        'house_owner_id',
        'building_id',
        'name',
        'owner_name',
        'owner_contact',
        'owner_email',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('house_owner', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->hasRole('house_owner')) {
                $builder->where('house_owner_id', $user->id);
            }
        });
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    //    public function bills()
    //    {
    //        return $this->hasMany(Bill::class);
    //    }
    //
    //    public function tenant()
    //    {
    //        return $this->hasOne(Tenant::class, 'assigned_flat_id');
    //    }
}
