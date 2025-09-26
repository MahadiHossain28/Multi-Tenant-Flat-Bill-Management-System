<?php

namespace App\Models;

use App\Observers\BillCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

#[ObservedBy(BillCategoryObserver::class)]
class BillCategory extends Model
{
    protected $fillable = [
        'building_id',
        'name',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('house_owner', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->hasRole('house_owner')) {
                $builder->whereHas('building', function ($q) use ($user) {
                    $q->where('house_owner_id', $user->id);
                });
            }
        });
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class, 'category_id');
    }
}
