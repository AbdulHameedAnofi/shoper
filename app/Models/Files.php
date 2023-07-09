<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'uuid',
        'file_name',
        'path',
        'size',
        'type'
    ];
}
