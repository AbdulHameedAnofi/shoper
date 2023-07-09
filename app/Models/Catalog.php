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

    public function userList() {
        return $this->belongsTo(User::class);
    }
}
