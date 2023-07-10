<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'uuid',
        'category_uuid',
        'item_name',
        'note',
        'metadata'
    ];

    protected $cast = [
        'metadata' => 'array'
    ];

    public function image()
    {
        return $this->hasOne(Files::class, 'item_uuid', 'uuid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'item_uuid', 'uuid');
    }

    public function catalogItems()
    {
        return $this->hasMany(CatalogItem::class, 'item_uuid', 'uuid');
    }
}
