<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EditPanduanResource\Pages;
use App\Filament\Resources\EditPanduanResource\RelationManagers;
use App\Models\EditPanduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class EditPanduanResource extends Resource
{
    protected static ?string $model = EditPanduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul_1')
                    ->required()
                    ->maxLength(150),
                Forms\Components\Textarea::make('isi_1')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('judul_2')
                    ->required()
                    ->maxLength(150),
                Forms\Components\Textarea::make('isi_2')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEditPanduans::route('/'),
            'create' => Pages\CreateEditPanduan::route('/create'),
            'edit' => Pages\EditEditPanduan::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin'; // sesuaikan 'role'
    }
    

}
