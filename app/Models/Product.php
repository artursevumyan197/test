<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * @var int|mixed
     */
    protected $fillable = [
        'name',
        'user_id',
        'active',
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
        });

        self::created(function($model){
            $model->active = false;
        });

        self::updating(function($model){

        });

        self::updated(function($model){
            $model->active = false;
        });

        self::deleting(function($model){

        });

        self::deleted(function($model){

        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
