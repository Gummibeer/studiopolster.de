<?php

namespace App\Providers;

use Astrotomic\Stancy\Contracts\ExportFactory as ExportFactoryContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->booted(function (): void {
            $this->app->call([$this, 'booted']);
        });
    }

    public function booted(ExportFactoryContract $exportFactory): void
    {
        $exportFactory->addSheetCollectionName('static');
    }
}
