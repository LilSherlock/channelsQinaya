<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class channel extends Model
{
    protected $table = 'channel';

    protected $fillable = [
        'name',
        'logo',
        'url',
        'categoryName',
        'categorySlug',
        'countryName',
        'countryCode',
        'languageName',
        'languageCode',
        'tvgId',
        'tvgName',
        'tvgUrl',
    ];
}
