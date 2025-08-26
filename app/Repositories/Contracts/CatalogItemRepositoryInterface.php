<?php

namespace App\Repositories\Contracts;

interface CatalogItemRepositoryInterface
{
    public function addItem(string $catalog_uuid, string $item_uuid);
    public function removeItem(string $catalog_uuid, string $item_uuid);
    
}