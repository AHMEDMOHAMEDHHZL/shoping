<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // الأعمدة القابلة للتعبئة
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // الأعمدة التي يجب إخفاؤها عند التحويل إلى JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // تحويل الأعمدة
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
