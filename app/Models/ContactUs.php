<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends BaseModel
{
    use HasFactory;
    protected $fillable=['name','email','id_number','message'];
}