<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class advertisment extends Controller
{
    function Dashboard()
    {
        return view('user');
    }

    function DashboardData(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        
           
        ]);
    }

    function project()
    {
        return view('userproject');
    }

    function view()
    {
        return view('userview');
    }
}
