<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('convert_money', function ($money) {
            return "<?php echo number_format($money, 0, '', ','); ?>";
        });

        if(Session::has('id_anonymous')){

        }
        else{
            $uniqid = uniqid();
            Session::push('id_anonymous', $uniqid);
        }
    }
}
