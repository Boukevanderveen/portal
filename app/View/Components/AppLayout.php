<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        //needs if user and else visitor
        if (auth()->user()->type == 'admin') {
            return view('layouts.admin_app');
        } else {
            return view('layouts.app');
        } 
    }
}
