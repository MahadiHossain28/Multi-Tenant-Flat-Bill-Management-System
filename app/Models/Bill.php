<?php

namespace App\Models;

use App\Enums\BillStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Bill extends Model
{
    protected $fillable = [
        'building_id',
        'flat_id',
        'category_id',
        'month',
        'amount',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        //        'month' => 'date',
        'amount' => 'decimal:2',
        'status' => BillStatus::class,
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

    // relationships
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BillCategory::class, 'category_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // convenience accessor to compute balance
    public function getPaidTotalAttribute(): float
    {
        // Sum all payments amounts related to this bill, default to 0 if none
        return (float) $this->payments()->sum('amount');
    }

    public function getDueAmountAttribute(): float
    {
        // Calculate due by subtracting paid total from the bill amount
        return (float) $this->amount - (float) $this->paid_total;
    }
}
