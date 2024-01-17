<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Casts\UserTypeCast;

class UserType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'updated_by_user_id',
        'authorizations',
        'type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'authorizations' => 'json',
        'type' => UserTypeCast::class,
    ];

    /**
     * Get User
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo{
        return $this->belongsTo(user::class);
    }

}
