<?php
declare(strict_types=1);

namespace Nagyist\NovaMarkdown;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Nagyist\NovaMarkdown\Http\Middleware\Authorize;

class MarkdownToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // $this->routes();
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova:api', Authorize::class], 'nova-markdown')
            ->group(__DIR__.'/../routes/inertia.php');

        Route::middleware(['nova:api', Authorize::class])
            ->prefix('nova-vendor/nagyist/nova-markdown')
            ->group(__DIR__.'/../routes/api.php');
    }

}
