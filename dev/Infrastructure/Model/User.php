<?php

namespace Dev\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static where(string $string, $id)
 * @method static whereIn(string $string, mixed|null $regIds)
 * @property mixed $last_login_as
 * @property mixed $phone
 * @property mixed $api_token
 * @property mixed $password
 * @property mixed $fcm_token
 */
class User extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles;
    use SoftDeletes;

    protected $guarded = ['id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'type',
        'password',
        'email',
        'gender',
        'lang',
        'image',
        'phone_code',
        'fcm_token',
        'api_token',
        'notification_status',
        'identity_image',
        'identity_number',
        'identity_type',
        'last_login_as',
        'birthdate',
        'doctor_id',
        'doctor_category_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function userNotifications(): HasMany
    {
        return $this->hasMany(UserNotification::class, 'user_id', 'id');
    }
}
