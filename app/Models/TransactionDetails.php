<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetails extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaction_details';

    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at'
    ];

    protected $hidden = [
       'id', 'created_at', 'deleted_at', 'updated_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

}
