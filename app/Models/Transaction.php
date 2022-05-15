<?php

namespace App\Models;

use App\Models\UserModel;
use App\Models\TravelPackage;
use App\Models\TransactionDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';

    protected $guarded = [
        'id', 'deleted_at', 'created_at', 'updated_at'
    ];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'users_id', 'id');
    }

    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetails::class, 'transactions_id', 'id');
    }
    
}
