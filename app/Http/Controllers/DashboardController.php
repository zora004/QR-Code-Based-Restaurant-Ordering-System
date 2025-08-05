<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Handle any related actions for the dashboard.
     */
    public function handleAction(Request $request)
    {
        // Handle dashboard actions here
    }
}