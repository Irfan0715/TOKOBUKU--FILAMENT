<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\Page;
use App\Models\Order;

class ViewOrder extends Page
{
    protected static string $resource = OrderResource::class;

    public Order $record;

    protected static string $view = 'filament.resources.order-resource.pages.view-order';

    public function mount(Order $record): void
    {
    $this->record = $record;
    }
}

