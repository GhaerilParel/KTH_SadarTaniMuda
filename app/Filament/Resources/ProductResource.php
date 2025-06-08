<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent'; // ikon lebih menarik
    protected static ?string $navigationLabel = 'Produk'; // label menu sidebar
    protected static ?string $pluralModelLabel = 'Produk'; // label di halaman list
    protected static ?string $modelLabel = 'Produk'; // label di halaman detail/form

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\FileUpload::make('image')
                    ->image()->directory('products')->required(),
                Forms\Components\FileUpload::make('gallery')
                    ->multiple()->directory('products/gallery'),
                 Forms\Components\TextInput::make('detail_url')->label('Detail URL'),
            Forms\Components\TextInput::make('service_detail_slug')
                ->label('Slug Detail Produk')
                ->helperText('Isi dengan slug dari ServiceDetail (lihat di menu Detail Produk)')
                ->required(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->width(60),
                Tables\Columns\TextColumn::make('name')
                    ->label('Judul')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil') // icon edit
                    ->label('Edit'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

