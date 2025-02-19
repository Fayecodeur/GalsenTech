<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        "web_site_name",
        "web_site_email",
        "web_site_phone",
        "web_site_address",
        "web_site_logo",
        "about_web_site",
    ];
}
