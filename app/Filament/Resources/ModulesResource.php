<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModulesResource\Pages;
use App\Filament\Resources\ModulesResource\RelationManagers;
use App\Models\Companies;
use App\Models\Modules;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Support\Str;
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
                Forms\Components\TextInput::make('name')
                    ->label('Module Name')
                    ->live(onBlur: true)
                    ->required()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->maxLength(255)
                    ->unique(Modules::class, 'slug', ignoreRecord: true),

                TextInput::make('total_level')
                    ->required()
                    ->label('Total Level')
                    ->numeric(),

                TextInput::make('video')
                    ->required()
                    ->label('URL Video')
                    ->url(),
                    
                Forms\Components\Select::make('companies_id')
                    ->searchable()
                    ->options(Companies::all()->pluck('name', 'id'))
                    ->label('Company Name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('companies.name')
                    ->label('Company'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Module Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('total_level')
                    ->label('Total Level'),

                Tables\Columns\TextColumn::make('video')
                    ->label('URL Video')
                    ->sortable()
                    ->url(fn($record) => $record->video)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
