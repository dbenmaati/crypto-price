<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoinResource\Pages;
use App\Filament\Resources\CoinResource\RelationManagers;
use App\Models\Coin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;


class CoinResource extends Resource
{
    protected static ?string $model = Coin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(100),
                //Forms\Components\TextInput::make('rank')
                //    ->required()
                //    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('symbol')
                    ->required()
                    ->maxLength(100),
                Forms\Components\FileUpload::make('logo'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('website')
                    ->maxLength(100),
                Forms\Components\TextInput::make('whitepaper')
                    ->maxLength(100),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(100),
                Forms\Components\TextInput::make('telegram')
                    ->tel()
                    ->maxLength(100),
                Forms\Components\TextInput::make('discord')
                    ->maxLength(100),
                Forms\Components\TextInput::make('explorer')
                    ->maxLength(100),
                Forms\Components\Toggle::make('confirmed')->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rank')->toggleable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('logo')->disk('coins'),
                Tables\Columns\TextColumn::make('name')->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('symbol')->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('whitepaper')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('telegram')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('discord')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('explorer')->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\IconColumn::make('confirmed')->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListCoins::route('/'),
            'create' => Pages\CreateCoin::route('/create'),
            'edit' => Pages\EditCoin::route('/{record}/edit'),
        ];
    }  
    
    public static function canCreate(): bool
    {
        return false;
    }
}
