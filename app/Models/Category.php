<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'category_name'
    ];

    /**
     * Gets the items for the category
     * 
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'item_uuid', 'uuid');
    }
}
