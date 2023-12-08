<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable=[
        'production_date',
        'expiry_date',
    ];
    /**
     * Get the user that owns the Date
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() 
    {
        return $this->belongsTo(Product::class, 'date_id', 'id');
    }
}
