<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\Media;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Models\GeneralSetting;
use Awcodes\Curator\CuratorPlugin;
use Filament\Support\Colors\Color;
use App\Filament\Widgets\VisitSite;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
     
    public function panel(Panel $panel): Panel
    {
        $color_setting = GeneralSetting::first();
        if(!empty($color_setting)){
            $media = Media::where('id',$color_setting->favicon)->first();
             $favicon = 'storage/'.$media->path;
        }else{
            $favicon = 'assets/imgs/sample-favicon.png';
        }
       
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => !empty($color_setting) ?  $color_setting->primary_color : '#d52122',
                'secondary' => !empty($color_setting) ?  $color_setting->primary_color : '#18181b',
            ])
            
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                VisitSite::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media')
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup('Content')
                    ->navigationSort(3)
                    ->navigationCountBadge()
                    ->registerNavigation(false)
                    ->defaultListView('grid')
                    ->resource(\Awcodes\Curator\Resources\MediaResource::class)
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandLogo(fn () => view('filament.logo'))
             ->brandLogoHeight('3rem')
             ->profile()
             ->favicon(asset($favicon));
              
    }
}
