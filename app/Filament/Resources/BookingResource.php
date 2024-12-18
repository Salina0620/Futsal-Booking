<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ActionsColumn;


class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('futsal_ground_id')
                    ->relationship('futsalGround', 'name')
                    ->required()
                    ->label('Ground Name'),
                Forms\Components\TextInput::make('customer_phone')
                    ->tel()
                    ->required()
                    ->label('Customer Phone'),
                Forms\Components\DatePicker::make('date')
                    // ->date()
                    ->required()
                    ->label('Booked Date'),
                Forms\Components\TimePicker::make('start_time')
                    ->required()
                    ->label('Start Time'),
                Forms\Components\TimePicker::make('end_time')
                    ->required()
                    ->label('End Time'),
                Forms\Components\TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->disabled()
                    ->dehydrated(false) // Prevent it from being saved to the database
                    ->suffix('USD')
                    ->default(fn($record) => $record ? $record->total_amount : 0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('futsalGround.name')
                    ->label('Ground Name'),
                // ->sortable()
                // ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('Customer Phone'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label(' Date'),
                Tables\Columns\TextColumn::make('start_time')
                    ->time()
                    ->label('Start Time'),
                Tables\Columns\TextColumn::make('end_time')
                    ->time()
                    ->label('End Time'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->sortable()
                    ->money('USD'),
                    // Tables\Columns\TextColumn::make('action')
                    // ->label('Actions')
                    // ->formatStateUsing(fn () => ' ')
                    // ->html()
                    // ->extraAttributes(['class' => 'flex gap-2 justify-center']),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // View action
                Tables\Actions\EditAction::make(), // Edit action
                Tables\Actions\DeleteAction::make(), // Delete action
            ])
            // ->actionsColumnLabel('Actions') // Add this line to label the actions column.

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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
