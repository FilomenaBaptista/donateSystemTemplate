<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class ApiLekeProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('api-leke', function(){
           return  Http::withOptions([
            'verify'=>false,
            'base_uri' => 'https://www.leke.ao/wp-json'
           ])->withHeaders([
                'Authorization' => 'Bearer',
            ]);
        });
    }
}
