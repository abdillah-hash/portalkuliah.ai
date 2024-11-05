<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModulesResource\Pages;
use App\Filament\Resources\ModulesResource\RelationManagers;
use App\Models\Modules;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModulesResource extends Resource
{
    protected static ?string $model = Modules::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';

    protected static ?string $navigationGroup = 'Education Management';	

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Module Name')
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->label('Slug')
                    ->maxLength(255),

                TextInput::make('total_level')
                    ->required()
                    ->label('Total Level')
                    ->numeric(),

                TextInput::make('video')
                    ->required()
                    ->label('Video Link')
                    ->url() 
                    ->maxLength(255),

                TextInput::make('companies_id')
                    ->required()
                    ->label('Company'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Module Name'),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),

                Tables\Columns\TextColumn::make('total_level')
                    ->label('Total Level'),

                Tables\Columns\TextColumn::make('video')
                    ->label('Video ID'),

                Tables\Columns\TextColumn::make('companies.name')
                    ->label('Company'),
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
            'index' => Pages\ListModules::route('/'),
        ];
    }
}
