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

    public function getById($id)
    {
        $id = Crypt::decrypt($id);

        $result = Task::find($id);

        return response()->json($result);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'etitle' => 'required|string|max:255',
            'edescription' => 'required|string',
            'estatus' => 'required|string',
            'epriority' => 'required|string',
            'ecategory' => 'required|string',
            'edue_date' => 'nullable|date',
        ]);

        $providerId = $request->input('euser_id');

        $user =  User::where('provider_id', $providerId)->first();

        $validated['euser_id'] = $user->id;

        $task = Task::findOrFail($request->input('eid'));

        $task->title = $validated['etitle'];
        $task->description = $validated['edescription'];
        $task->status = $validated['estatus'];
        $task->priority = $validated['epriority'];
        $task->category = $validated['ecategory'];
        $task->due_date = $validated['edue_date'];
        $task->user_id = $validated['euser_id'];
        $update = $task->save();

        if ($update) {
            session()->flash('messages', [
                'success' => 'Berhasil memperbarui data!'
            ]);
        } else {
            session()->flash('messages', [
                'danger' => 'Gagal memperbarui data!'
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
