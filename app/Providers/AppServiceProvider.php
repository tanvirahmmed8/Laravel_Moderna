<?php

namespace App\Providers;

use View;
use App\Models\Post;
use App\Models\Header;
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
        
        View::composer('*', function($view){
            //any code to set $val variable
            $logo = Header::all();
            $post = Post::all();
            $view->with('foo', $logo);
            $view->with( 'post', $post);
        });
       
        
    }
}
