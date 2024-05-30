<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class FlashMessageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Nếu không có session được khởi tạo, thiết lập một session trống
        // if (!$request->session()->has('init')) {
        //     $request->session()->put('init', true);
        //     $request->session()->flash('init', true);
        // }

        // // Nếu có thông báo flash trong session
        // if ($request->session()->has('success')) {
        //     // Chuyển thông báo flash vào view
        //     View::share('successMessage', $request->session()->get('success'));
        // }

        return $next($request);
    }
}
