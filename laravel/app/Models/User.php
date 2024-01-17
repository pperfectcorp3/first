<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    /**
     * Get UserType
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userType() : HasOne{
        return $this->hasOne(UserType::class);
    }

    /**
     * Get user type
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute|null
     */
    public function type() : Attribute|null{
        return !is_null($this->userType) ? Attribute::make(get : fn() => $this->userType->type) : null;
    }

    /**
     * Check if user as something
     *
     * @param  string  $type
     * @param  bool    $super
     * @return bool
     */
    public function i(string $type, bool $super = false) : bool{
        return $this->type() == $type || ($super === true && $this->isSuper());
    }

    /**
     * Check if user is a admin
     *
     * @param  $super
     * @return bool
     */
    public function isAdmin(bool $super = false) : bool{
        return $this->i('admin', $super);
    }

    /**
     * Check if user is a agent
     *
     * @param  $super
     * @return bool
     */
    public function isAgent(bool $super = false) : bool{
        return $this->i('agent', $super);
    }

    /**
     * Check if user is an simple
     *
     * @param  bool  $super
     * @return bool
     */
    public function isSimpleUser(bool $super = false) : bool{
        return $this->i('simple', $super);
    }

    /**
     * Check if user is an super
     *
     * @return bool
     */
    public function isSuper() : bool{
        return $this->i('super') && $this->userType->authorizations == 'all';
    }
}
