<?php

namespace App\Observers;

use App\Models\Router;

class RouterObserver
{
    public function creating(Router $router)
    {
        try {
            $identity = collect(array_values($router->getRouterOS()->query('/system/identity/print')->read())[0]);
            if (!$identity->has('name')) {
                throw new \Exception('Bilinmeyen hata');
            }

            $router->identity = $identity->get('name');
            $router->log_prefix = $identity->get('name');
        }catch (\Exception $e){
            flash()->error('Router bağlantı başarısız.');
            $router->identity = \Str::slug($router->name);
            $router->log_prefix = \Str::slug($router->name);
//            return false;
        }
    }
    public function created(Router $router)
    {

    }

    public function updated(Router $router)
    {
    }

    public function deleted(Router $router)
    {
    }

    public function restored(Router $router)
    {
    }

    public function forceDeleted(Router $router)
    {
    }
}
