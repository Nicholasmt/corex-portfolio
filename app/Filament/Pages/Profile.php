<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.profile';
    protected static bool $shouldRegisterNavigation = false;

    protected function getFormSchema():array
    {
        return ([
            TextInput::make('matric_number')->disabled(),
        ]);
    }
}
