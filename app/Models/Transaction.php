<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['customization_id', 'user_id', 'product_id', 'address', 'bank', 'proof_of_payment'];

    public function customization()
    {
        return $this->belongsTo(Customization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}