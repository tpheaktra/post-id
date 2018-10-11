<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\User;
use auth;
use App\Helpers\Helpers;
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
        view()->composer(['layouts.app'], function($view)
            {
                $id = auth::user()->id;
                $base = Helpers::getBase($id)->firstOrFail();
               // echo $base['health_facilities']->name_kh;exit();
                if($base->hos_base <= 0){
                    $show_base =  'Unknown';
                }else{
                    $show_base =  $base['health_facilities']->name_kh;
                }

                $check_base = User::where('id',$id)->first();

                $getAllBase = Helpers::getAllBase($id)->get();


                $view->with(compact('check_base','show_base','getAllBase'));
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
