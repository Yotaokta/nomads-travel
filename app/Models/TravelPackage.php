<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Gallery;

class TravelPackage extends Model
{
    use SoftDeletes;

    protected $table = 'travel_package';

    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $hidden = [
        
    ];

    /**
     * Get all of the comments for the TravelPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'travel_package_id', 'id');
    }

}
