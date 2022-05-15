<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TravelPackage;

class Gallery extends Model
{
    use softDeletes;

    protected $table = 'galleries';

    protected $guarded = [
        'id', 'deleted_at ', 'created_at', 'updated_at'
    ];

    protected $hidden = [

    ];

        /**
     * Get all of the comments for the TravelPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }

}
