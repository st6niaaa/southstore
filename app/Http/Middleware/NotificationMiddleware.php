<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotificationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Add a view composer to handle the notification display
        view()->composer('*', function ($view) {
            $notification = session('notification');
            if ($notification) {
                $view->with('notification', $notification);
            }
        });

        return $next($request);
    }
}