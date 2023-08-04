<?php

namespace App\Models;

use App\Enums\DayoffStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dayoff extends Model
{
    use HasFactory;

    protected $table = 'dayoffs';

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'description',
        'status',
        'dayoff_type',
        'total_of_days'
    ];

    protected $casts = [
        'status' => DayoffStatusEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
