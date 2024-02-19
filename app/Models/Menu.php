<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_level',
        'menu_name',
        'menu_link',
        'menu_icon',
        'parent_id',
        'delete_mark',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = 'menu_id';

    public $incrementing = false;
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = 'MID_' . uniqid();
        });

        static::deleting(function ($model) {
            $model->delete_mark = '1';
            $model->save();
        });
    }

    public function menuLevel(){
        return $this->belongsTo(MenuLevel::class, 'id_level');
    }

    public function menuUsers()
    {
        return $this->hasMany(MenuUser::class, 'menu_id');
    }
}
