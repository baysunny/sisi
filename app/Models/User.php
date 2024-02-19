<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'email',
        'no_hp',
        'wa',
        'pin',
        'id_jenis_user',
        'status_user',
        'delete_mark',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = 'id_user';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = 'UID_' . uniqid();
        });

        static::deleting(function ($model) {
            $model->delete_mark = '1';
            $model->save();
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function menuUsers(){
        return $this->hasMany(MenuUser::class, 'id_user');
    }

    public function userFotos(){
        return $this->hasMany(UserFoto::class, 'id_user');
    }

    public function latestFoto(){
        return $this->hasOne(UserFoto::class, 'id_user')->latest()->limit(1);
    }
}
