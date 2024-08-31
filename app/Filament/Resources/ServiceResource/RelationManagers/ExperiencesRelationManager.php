<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ExperiencesRelationManager extends RelationManager
{
    protected static string $relationship = 'experiences';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('title')->required()->maxLength(255),
                 TextInput::make('organization')->required(),
                 TextInput::make('city')->required(),
                 TextInput::make('location')->required(),
                 Textarea::make('description')->required(),
                 DatePicker::make('start_date')->required(),
                 Toggle::make('present')->live(),
                 DatePicker::make('end_date')
                           ->visible(function(Get $get){
                              if($get('present') == true){
                                   return false;
                              }else{
                                  return true;
                              }
                           })
                          ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('organization')->searchable()->sortable(),
                TextColumn::make('city')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
