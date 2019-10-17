<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class CalendarController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('calendar.index');
    }
}