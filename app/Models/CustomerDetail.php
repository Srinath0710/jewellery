<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class CustomerDetail extends Model
{
    use HasFactory;

    protected $table = 'customer_details';

    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'amount',
        'date_of_purchase',
        'renewal_date',
        'day_of_purchase',
        'loan_number',
        'interest_percentage',
        'gold_weight',
        'silver_weight',
        'number_of_gold',
        'number_of_silver',
        'gold'
    ];
}
