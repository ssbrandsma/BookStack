<?php

namespace BookStack;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'vin',
        'modelyear',
        'manufactoryear',
        'factory',
        'body',
        'color',
        'trim',
        'dso',
        'axle',
        'engine',
        'trans',
        'serial',
        'date',
        'source',
        'thumbnail',
        'user_id'
    ];

    
    /**
     * Get the main user record associated with the customer.
     *
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
