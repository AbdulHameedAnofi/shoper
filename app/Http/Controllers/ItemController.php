<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ItemRepositoryInterface;
use App\Http\Requests\CreateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(private ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    //
    public function createItem(CreateItemRequest $request)
    {
        return $this->itemRepository->addItem($request->validated());
    }
}
