<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDetails extends Model
{
    // use HasFactory;
    public function account_details()
    {
        return $this->belongsTo(AccountDetails::class,'account_id','id');
    }
    
    public function category_details()
    {
        return $this->belongsTo(ExpensesCategory::class,'category','id');
    }
}
