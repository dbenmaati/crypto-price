<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;

class SettingResource extends Resource
{
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('site_title')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('site_logo')
                    ->image()
                    ->preserveFilenames(),
                Forms\Components\TextInput::make('site_favicon')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('meta_keywords')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('telegram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discord')
                    ->maxLength(255),
                Forms\Components\TextInput::make('reddit')
                    ->maxLength(255),
                Forms\Components\TextInput::make('medium')
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255),
                Forms\Components\TextInput::make('google_analytics')
                    ->maxLength(255),
                Forms\Components\TextInput::make('google_webmaster')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bing_webmaster')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cmc_api')
                    ->maxLength(255),
                Forms\Components\Toggle::make('maintenance_mode')
                    ->required(),
                Forms\Components\Textarea::make('footer')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('js_code')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_favicon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_keywords')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telegram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discord')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reddit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medium')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('google_analytics')
                    ->searchable(),
                Tables\Columns\TextColumn::make('google_webmaster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bing_webmaster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cmc_api')
                    ->searchable(),
                Tables\Columns\IconColumn::make('maintenance_mode')
                    ->boolean(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }    
}
