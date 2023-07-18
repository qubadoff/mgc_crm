<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Participation extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'participations';

    protected $fillable = [
        'name'
    ];

}
