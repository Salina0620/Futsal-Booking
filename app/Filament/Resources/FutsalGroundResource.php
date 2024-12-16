<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FutsalGroundResource\Pages;
use App\Filament\Resources\FutsalGroundResource\RelationManagers;
use App\Models\FutsalGround;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FutsalGroundResource extends Resource
{
    protected static ?string $model = FutsalGround::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('Ground Name'),
                Forms\Components\TextInput::make('location')
                ->required()
                ->label('Ground Location'),
                Forms\Components\TextInput::make('price_per_hour')
                ->required()
                ->numeric()
                ->label('Price Per Hour'),
                Forms\Components\Select::make('vendor_id')
                ->relationship('vendor', 'name')
                ->required()
                ->label('Vender Name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->label('Ground Name'),
                Tables\Columns\TextColumn::make('location')
                ->label('Ground Location'),
                Tables\Columns\TextColumn::make('price_per_hour')
                ->label('Price Per Hour'),
                Tables\Columns\TextColumn::make('vendor.name')
                ->label('Vender Name'),
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
            'index' => Pages\ListFutsalGrounds::route('/'),
            'create' => Pages\CreateFutsalGround::route('/create'),
            'edit' => Pages\EditFutsalGround::route('/{record}/edit'),
        ];
    }
}
