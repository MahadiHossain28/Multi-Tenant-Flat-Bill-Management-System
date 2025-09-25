<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Building extends Model
{
    protected $fillable = [
        'house_owner_id',
        'name',
        'address',
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

    public function billCategories(): HasMany
    {
        return $this->hasMany(BillCategory::class, 'building_id');
    }
}
