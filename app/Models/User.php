<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const DISABLE_ACCOUNT = 0;
    const ENABLED_ACCOUNT = 1;
    const STATUS_ACCOUNT = [
        self::DISABLE_ACCOUNT => 'Ngưng hoạt động',
        self::ENABLED_ACCOUNT => 'Đang hoạt động',
    ];
    const ROLE = [
        self::DISABLE_ACCOUNT => 'Nhân viên',
        self::ENABLED_ACCOUNT => 'Admin',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'avatar',
        'fullname',
        'address',
        'phone',
        'status',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('fullname', 'LIKE', '%' . $search . '%');
        });
    }
}
