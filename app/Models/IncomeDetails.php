<?php

namespace App\Models;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeDetails extends Model
{
    // use HasFactory;
    public function account_details()
    {
        return $this->belongsTo(AccountDetails::class,'account_id','id');
    }
    
    public function category_details()
    {
        return $this->belongsTo(IncomeCategory::class,'category','id');
    }
}
