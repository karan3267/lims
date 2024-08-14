<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class InventoryProduct extends Model
{
    //
    


    protected $fillable = [
        'receipt_no',
        'chemical_name',
        'supplier_name',
        'lot_no',
        'expiration_date',
        'received_on',
        'units',
        'amount_received',
        'amount_accepted',
        'received_by',
        'storage_location',
        'product_id',
    ];
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
