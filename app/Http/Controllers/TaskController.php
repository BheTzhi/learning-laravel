<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{

    public function index()
    {
        $data['user'] = Session::get('provider_id');

        $data['title'] = 'Task Manager';

        $data['tasks'] = Task::all();

        if (!$data['user']) {
            return redirect('/');
        } else {
            return view('pages.task', compact('data'));
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'category' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        $providerId = $request->input('user_id');

        $user =  User::where('provider_id', $providerId)->first();

        $validated['user_id'] = $user->id;

        $insert = Task::create($validated);

        if ($insert) {
            session()->flash('messages', [
                'success' => 'Berhasil tambah data!'
            ]);
        } else {
            session()->flash('messages', [
                'danger' => 'Gagal tambah data!'
            ]);
        }

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);

        $task = Task::findOrFail($id);

        $task->delete();

        session()->flash('messages', [
            'info' => 'Berhasil hapus data!'
        ]);

        return redirect()->route('home');
    }
}
