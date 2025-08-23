<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'uuid',
        'user_uuid',
        'catalog_name',
        'status'
    ];

    public function usersList() {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function catalogItems()
    {
        return $this->hasMany(CatalogItem::class, 'catalog_uuid', 'uuid');
    }
}
