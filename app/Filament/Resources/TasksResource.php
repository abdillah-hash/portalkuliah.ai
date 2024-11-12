<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TasksResource\Pages;
use App\Filament\Resources\TasksResource\RelationManagers;
use App\Models\Tasks;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TasksResource extends Resource
{
    protected static ?string $model = Tasks::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Education Management';	

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                    ->required()
                    ->label('Name'),
                    
                TextInput::make('modules_id')
                    ->label('Module')
                    ->required(),

                TextInput::make('students_id')
                    ->label('Student')
                    ->required(),

                TextInput::make('duration')
                    ->required()
                    ->label('Duration')
                    ->numeric()
                    ->minValue(1),

                TextInput::make('level')
                    ->required()
                    ->label('Level')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module.name')
                    ->label('Module Name'),

                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student Name'),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration'),

                Tables\Columns\TextColumn::make('level')
                    ->label('Level'),
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
            'index' => Pages\ListTasks::route('/'),
        ];
    }
}
