<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Settings
        $settingsRegistry = app('gears.settings_registry');
        $settingsRegistry->addByKey('orders.table_default');
        $settingsRegistry->addByKey('global.api_keys');
        $settingsRegistry->addByKey('event_blocks.audience_default');
                
        // Preferences
        $preferencesRegistry = app('gears.preferences_registry');
        $preferencesRegistry->addByKey('orders.table');
        
        // Set default values:
        Schema::defaultStringlength(191);
    }
}
