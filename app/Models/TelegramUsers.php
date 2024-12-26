<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUsers extends Model
{
    use HasFactory;

    protected $fillable=[
        "user_id",
        'first_name',
        'last_name',
        'username',
        'mobile',
        'avatar',
        'is_bot'
    ];

    protected $casts = [
        'is_bot' => 'boolean',
    ];

    public function scopeSearchFields($query)
    {
        $filters = request()->input("query", []);

        foreach ($filters ?? [] as $key => $value) {
            if (empty($value)) continue;
            switch ($key) {
                case 'name':
                    $query->where('first_name', 'like', "$value")
                    ->orWhere('last_name', 'like', "$value");
                    break;

            }
        }
        return $query;
    }
}
