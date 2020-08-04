<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =['name','title','link','is_active','is_draft','soft_delete'];
}
