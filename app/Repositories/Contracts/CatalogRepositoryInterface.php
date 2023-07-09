<?php

namespace App\Repositories\Contracts;

interface CatalogRepositoryInterface
{
    public function create(string $user_uuid, string $catalog_name);
    public function update(string $user_uuid, string $catalog_name);
    public function getList(string $user_uuid, string $catalog_name);
}