<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{

    public function index()
    {
        $data['user'] = Session::get('provider_id');

        $data['title'] = 'Task Manager';

        if (!$data['user']) {
            return redirect('/');
        } else {
            return view('pages.task', compact('data'));
        }
    }
}
