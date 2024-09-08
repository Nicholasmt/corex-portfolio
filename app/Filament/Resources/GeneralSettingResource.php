<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GeneralSetting;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GeneralSettingResource\Pages;
use App\Filament\Resources\GeneralSettingResource\RelationManagers;

class GeneralSettingResource extends Resource
{
    protected static ?string $model = GeneralSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Site Configurations';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Settings')->schema([
                    TextInput::make('full_name')->label('Full Name')->required(),
                    TextInput::make('profession')->label('Skill Profession')->required(),
                    ColorPicker::make('primary_color')->required(),
                    ColorPicker::make('secondary_color')->required(),
                    Textarea::make('bio')->label('Introduction Message')->required(),
                    CuratorPicker::make('logo'),
                    CuratorPicker::make('background_image'), 
                    CuratorPicker::make('passport'),
                    CuratorPicker::make('favicon'),
                ])->columns(2)->collapsible(),
                Section::make('Font Settings')->schema([
                    TextInput::make('font_name')->live(), 
                    TextInput::make('font_url')
                              ->required()
                              ->visible(function(callable $get){
                                 if($get('font_name')) {
                                    return true;
                                 }
                              }),  
                    TextInput::make('font_family')
                              ->required()
                             ->visible(function(callable $get){
                                if($get('font_name')) {
                                return true;
                                }
                            }),     
                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->searchable(),
                TextColumn::make('profession')->searchable(),
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
            'index' => Pages\ListGeneralSettings::route('/'),
            'create' => Pages\CreateGeneralSetting::route('/create'),
            'edit' => Pages\EditGeneralSetting::route('/{record}/edit'),
        ];
    }
}
