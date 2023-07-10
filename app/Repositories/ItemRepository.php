<?php

namespace App\Repositories;

use App\Contracts\Repositories\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{
    public function addItem(array $data)
    {
        return Item::create($data);
    }

    public function getItem(string $uuid)
    {
        return Item::whereUuid('uuid')->first()->load('image');
    }

    public function deleteItem(string $uuid)
    {
        $item = $this->getItem($uuid);
        $item->delete();
    }
}
