<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperatingHour extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

    /* protected $casts = [
        'saturday' => 'array',
        'sunday' => 'array',
        'monday' => 'array',
        'tuesday' => 'array',
        'wednesday' => 'array',
        'thursday' => 'array',
        'friday' => 'array',
    ]; */


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
