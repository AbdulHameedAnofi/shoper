<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'uuid',
        'item_uuid',
        'catalog_uuid',
        'quantity'
    ];
}
