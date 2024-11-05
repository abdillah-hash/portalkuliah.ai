<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupsResource\Pages;
use App\Filament\Resources\GroupsResource\RelationManagers;
use App\Models\Groups;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupsResource extends Resource
{
    protected static ?string $model = Groups::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Education Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Group Name')
                    ->maxLength(255),

                Select::make('tag')
                    ->required()
                    ->label('Tag')
                    // ->maxLength(50)
                    ->options ([
                    'Back-End Enginner' => 'Back End Enginner',
                    'DevOps Enginner' => 'DevOps Enginner',
                    'IT Monitoring' => 'IT Monitoring'
                ]),

                FileUpload::make('image')
                    // ->required()
                    ->label('Image')
                    ->directory('groups/images')
                    ->image(),

                TextInput::make('description')
                    ->label('Description')
                    ->maxLength(500),

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
                    ->label('Group Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tag')
                    ->label('Tag'),

                Tables\Columns\TextColumn::make('companies.name')
                    ->label('Company'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d-m-Y H:i'),
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
            'index' => Pages\ListGroups::route('/'),
        ];
    }
}
