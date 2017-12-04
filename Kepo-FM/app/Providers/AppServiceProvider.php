<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

      $this->app['router']->matched(function (\Illuminate\Routing\Events\RouteMatched $event) {
          $route = $event->route;
          if (!array_has($route->getAction(), 'guard')) {
              return;
          }
          $routeGuard = array_get($route->getAction(), 'guard');
          $this->app['auth']->resolveUsersUsing(function ($guard = null) use ($routeGuard) {
              return $this->app['auth']->guard($routeGuard)->user();
          });
          $this->app['auth']->setDefaultDriver($routeGuard);
      });

      Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
          $explode = explode(',', $value);
          $allow = ['png', 'jpg', 'jpeg', 'gif'];
          $format = str_replace(
              [
                  'data:image/',
                  ';',
                  'base64',
              ],
              [
                  '', '', '',
              ],
              $explode[0]
          );
          // check file format
          if (!in_array($format, $allow)) {
              return false;
          }
          // check base64 format
          if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
              return false;
          }
          return true;
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
