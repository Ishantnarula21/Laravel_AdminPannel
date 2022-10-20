<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorysummary extends Model
{
    use HasFactory;
    protected $table = "category";
    public $timestamps = false;
}
