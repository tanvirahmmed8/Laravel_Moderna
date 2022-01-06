<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioPOst extends Model
{
    use HasFactory;

    public function CategoriesWork(){
        return $this->belongsTo(CategoriesWork::class);
    }
}
