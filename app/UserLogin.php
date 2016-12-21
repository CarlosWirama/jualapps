<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'login_ip'
    ];

    /**
     * Set PrimaryKey
     */
    protected $primaryKey = 'user_login_id';
    
    /**
     * automaticly set created_at when creating records
     */
    public $timestamps = false;
    public function setUpdatedAt($value) {
        static::creating( function ($model) {
            $model->setCreatedAt($model->freshTimestamp());
        });
    }
}
