<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Actions;
use App\Models\Contact;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ContactResource;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        $contact = Contact::get()->count();
        if($contact > 0)
        {  
            return [];
           
        }else{
            return [
                Actions\CreateAction::make(),
            ];
          
        }
            
    }
}
