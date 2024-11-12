<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Students;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('account_id')
                ->required()
                ->label('ID Account'),
            
            TextInput::make('phone')
                ->required()
                ->label('Mobile Phone Number')
                ->maxLength(20),
            
            TextInput::make('born_year')
                ->required()
                ->label('Year of Birth')
                ->numeric()
                ->maxLength(4)
                ->minLength(4),
            
            Select::make('job_type')
                ->label('Job Type')
                ->options([
                    'Student' => 'Student',
                    'Full-Time' => 'Full-Time',
                    'Part-Time' => 'Part-Time',
                    'Internship' => 'Internship',
                    'Freelance' => 'Freelance',
                    'Contract' => 'Contract', 
                    'Remote' => 'Remote',
                    'Another' => 'Another',
                ])
                ->required(),

            TextInput::make('companies_id')
                ->required()
                ->label('Company')
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('account_id')
                    ->label('ID Account'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Mobile Phone Number'),
                Tables\Columns\TextColumn::make('born_year')
                    ->label('Year of Birth'),
                Tables\Columns\TextColumn::make('job_type')
                    ->label('Job Type')      
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
            'index' => Pages\ListStudents::route('/'),
        ];
    }
}
