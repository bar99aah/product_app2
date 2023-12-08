<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'date_id',
        'image',
    ];
    public function date(){
        return $this->hasOne(Date::class, 'date_id', 'id');
    }
}
