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

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_uuid', 'uuid');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_uuid', 'uuid');
    }
}
