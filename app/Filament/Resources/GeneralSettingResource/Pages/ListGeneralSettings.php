<?php

namespace App\Filament\Resources\GeneralSettingResource\Pages;

use Filament\Actions;
use App\Models\GeneralSetting;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\GeneralSettingResource;

class ListGeneralSettings extends ListRecords
{
    protected static string $resource = GeneralSettingResource::class;

    protected function getHeaderActions(): array
    {
        $settings = GeneralSetting::get()->count();
        if($settings > 0)
        {  
            return [];
           
        }else{
            return [
                Actions\CreateAction::make(),
            ];
          
        }
    }
}
