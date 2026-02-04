<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\EditRecord;

class EditMenu extends EditRecord
{
    protected static ?string $title = 'Edit Menu';
    protected static string $resource = MenuResource::class;

    /**
     * Form KHUSUS untuk halaman Edit:
     * - Gambar TIDAK dipreview (menghindari spinner).
     * - Gambar OPSIONAL (tidak wajib saat edit).
     * - Jika tidak dipilih gambar baru, gambar lama tetap dipakai (lihat mutateFormDataBeforeSave()).
     */
    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nama Menu')
                ->required(),

            Textarea::make('description')
                ->label('Deskripsi')
                ->rows(3),

            FileUpload::make('image')
                ->label('Gambar')
                ->image()                     // pastikan hanya gambar
                ->previewable(false)          // ✅ matikan preview supaya tidak muter²
                ->directory('menus')          // simpan di storage/app/public/menus (dengan disk 'public')
                ->visibility('public')        // file bisa diakses via storage link
                ->preserveFilenames()         // opsional: nama file tetap
                // ->maxSize(2048)            // opsional: batasi ukuran (KB)
                // TIDAK required() di edit — biarkan opsional
            ,

            TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->required(),

            TextInput::make('quantity')
                ->label('Stok')
                ->numeric()
                ->required(),

            Toggle::make('available')
                ->label('Tersedia')
                ->default(true),
        ]);
    }

    /**
     * Jika user TIDAK memilih gambar baru saat edit,
     * maka JANGAN null-kan kolom image — tetap pakai gambar lama.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // $this->record adalah data lama (model Menu)
        if (!array_key_exists('image', $data) || empty($data['image'])) {
            // Tetap gunakan gambar lama
            $data['image'] = $this->record->image;
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
