<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Manajemen Transaksi';
    protected static ?string $pluralModelLabel = 'Manajemen Transaksi';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('user.name')->label('Pembeli')->searchable(),
                TextColumn::make('produk.nama')->label('Produk')->searchable(),
                TextColumn::make('jumlah')->label('Jumlah'),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR'),
            ])

            ->filters([
                //
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([]); // tidak perlu form jika hanya lihat data
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin'; // sesuaikan 'role'
    }
}
