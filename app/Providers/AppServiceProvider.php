<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Response;

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
        Schema::defaultStringLength(191);
        $this->responseMacro();
    }

    protected function responseMacro()
    {
        Response::macro('default', function ($code = 200, $message = '', $content = null, $total = 1, $offset = 1, $limit = 1) {
            $response = [
                'total'  => $total,
                'code'   => $code,
                'limit'  => $limit,
                'offset' => $offset,
                'message' => $message,
                'content' => (is_null($content)) ? (object) null : ( (is_array($content)) ? (array) $content : (object) $content ) 
            ];

            return Response::make($response);
        });
    }
}
