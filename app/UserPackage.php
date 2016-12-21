<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_package_id', 'transaction_progress', 'expire_at'
    ];

   /**
     * Set PrimaryKey
     */
    protected $primaryKey = 'user_package_id';
    
    /**
     * this table doesn't need timestamps
     */
    public $timestamps = false;
}
