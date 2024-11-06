<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function privacy_policy()
    {
        return view('system.menu.privacy-policy', [
            'title' => 'Privacy Policy',
        ]);
    }

    public function faq()
    {
        return view('system.menu.faq', [
            'title' => 'FAQ',
        ]);
    }

    public function about()
    {
        return view('system.menu.about', [
            'title' => 'About',
        ]);
    }

    public function contact()
    {
        return view('system.menu.contact', [
            'title' => 'Contact',
        ]);
    }
}
