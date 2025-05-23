<?php

namespace App\Filament\Resources\StockOpnameResource\Pages;

use App\Filament\Resources\StockOpnameResource;
use App\Models\Book;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStockOpname extends CreateRecord
{
    protected static string $resource = StockOpnameResource::class;

    protected function afterCreate(): void
    {
        $stockOpname = $this->record;

        // Update stock buku di tabel books
        $book = Book::find($stockOpname->book_id);
        if ($book) {
            $book->stock = $stockOpname->stok_sekarang;
            $book->save();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
