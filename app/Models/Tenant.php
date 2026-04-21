<?php

namespace Crater\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $connection = 'master';

    protected $fillable = [
        'name',
        'subdomain',
        'db_host',
        'db_name',
        'db_username',
        'db_password',
        'subscription_ends_at',
        'is_active',
        'order_id',
    ];

    protected $casts = [
        'subscription_ends_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
