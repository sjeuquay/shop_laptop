<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        View::composer('Site.header', function ($view) {
            $category = Category::take(4)->get();
            $view->with('category', $category);
        });
    }
}
