<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['picture','link','promotional_message','html_banner','is_active','is_draft','soft_delete','max_display'];
}
