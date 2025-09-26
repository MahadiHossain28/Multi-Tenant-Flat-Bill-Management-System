<?php

namespace App\Models;

use App\Observers\FlatObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

#[observedBy(FlatObserver::class)]
class Flat extends Model
{
    protected $fillable = [
        'house_owner_id',
        'building_id',
        'number',
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

    public function houseOwner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'house_owner_id');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function tenant(): HasOne
    {
        return $this->hasOne(Tenant::class, 'assigned_flat_id');
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class);
    }

    public function hasBillForMonth($month = null): bool
    {
        $month = $month ?? Carbon::now()->format('Y-m'); // Default to current month

        return $this->bills->contains(function ($bill) use ($month) {
            return Str::startsWith($bill->month, $month);
        });
    }

}
