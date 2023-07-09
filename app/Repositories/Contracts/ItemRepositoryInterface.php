<?php

namespace App\Contracts\Repositories;

interface ItemRepositoryInterface
{
    public function addItem(array $data);
    public function getItem(string $uuid);
    public function deleteItem(string $uuid); 
}