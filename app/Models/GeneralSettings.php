<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'contact_email',
        'layout',
        'currency_name',
        'currency_icon',
        'time_zone',
    ];
}
