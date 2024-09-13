<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.profile';
    protected static bool $shouldRegisterNavigation = false;
    public $name,$email,$password,$confirm_password;
           
    public function mount(): void
    {
         $this->form->fill(array_merge(
              auth()->user()->attributesToArray(),
             )
          );
    }

    protected function getFormSchema():array
    {
        return ([
            Section::make('Edit Profile')->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('password')->password()->revealable()->live(),
                TextInput::make('confirm_password')->password()->revealable()->required()->live()
                        ->visible(function(callable $get){
                            if($get('password')){
                                   return true;
                                }
                            }),
             ])->columns(2)
        ]);
    }

    public function submit()
    {
        
        if($this->password !== null){
            $this->validate([
                  'confirm_password'=>'same:password'
            ]);
        }
        auth()->user()->update([
                                'name'=> $this->name,
                                'email'=> $this->email,
                                'password'=> $this->password !== null ? Hash::make($this->password) : auth()->user()->password,
                              ]);

        Notification::make()
                    ->title('Saved Successfully!')
                    ->success()
                    ->send();
    }
}
