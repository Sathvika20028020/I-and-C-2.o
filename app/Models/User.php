<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'emp_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


public function folders()
{
    return $this->belongsToMany(Folder::class, 'folder_users');
}
public function isSuperadmin()
{
    return $this->role === 1;
}

public function isAdmin()
{
    return $this->role === 2;
}

public function employee()
{
    return $this->belongsTo(Employee::class, 'emp_id');
}

public function inventories()
{
    return $this->hasMany(AssetInventory::class);
}
public function lastLogin()
{
    return $this->hasOne(UserLogs::class)->latestOfMany();
}

}
