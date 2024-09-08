<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\ContactResource\Pages\CreateContact;
use App\Filament\Resources\GeneralSettingResource\Pages\CreateGeneralSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CreateGeneralSetting::disableCreateAnother();
        CreateContact::disableCreateAnother();
        View::composer('*', function ($view) {
            $setting = GeneralSetting::first();
            $view->with(['setting'=>$setting]);
        });
    }
}
