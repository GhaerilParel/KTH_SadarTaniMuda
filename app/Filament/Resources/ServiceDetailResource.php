<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceDetailResource\Pages;
use App\Models\ServiceDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;

class ServiceDetailResource extends Resource
{
    protected static ?string $model = ServiceDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // ikon lebih menarik
    protected static ?string $navigationLabel = 'Detail Produk'; // label menu sidebar
    protected static ?string $pluralModelLabel = 'Detail Produk'; // label di halaman list
    protected static ?string $modelLabel = 'Detail Produk'; // label di halaman detail/form

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\FileUpload::make('image')->image()->directory('service-details'),
                Forms\Components\Repeater::make('specs')
                    ->schema([
                        Forms\Components\TextInput::make('value')->label('Spesifikasi'),
                    ])->label('Spesifikasi Produk'),
                Forms\Components\Repeater::make('benefits')
                    ->schema([
                        Forms\Components\TextInput::make('value')->label('Manfaat'),
                    ])->label('Manfaat'),
                Forms\Components\Repeater::make('tabs')
                    ->schema([
                        Forms\Components\TextInput::make('title')->label('Judul Tab'),
                        Forms\Components\TextInput::make('subtitle')->label('Sub Judul'),
                        Forms\Components\Textarea::make('content')->label('Isi'),
                        Forms\Components\FileUpload::make('image')->image()->directory('service-details/tabs'),
                    ])->label('Tab Konsumsi'),
                Forms\Components\Textarea::make('footer_text')->label('Footer Text'),
                TextInput::make('buy_link')
                    ->label('Link Beli Produk')
                    ->url()
                    ->placeholder('https://shopee.co.id/produk-anda')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->width(60)
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->label('Edit'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceDetails::route('/'),
            'create' => Pages\CreateServiceDetail::route('/create'),
            'edit' => Pages\EditServiceDetail::route('/{record}/edit'),
        ];
    }
}
