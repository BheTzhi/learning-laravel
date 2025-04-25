@extends('layouts.app')

@yield('content')
<div class="content">
    <div class="col-12 mb-4">
        <a class="btn btn-outline-primary mb-4 adds"><i class="fas fa-plus"></i> Add Task</a>
        @if (session('messages'))
            @foreach (session('messages') as $key => $message)
                <div class="alert alert-{{ $key }}">
                    {{ $message }}
                </div>
            @endforeach
        @endif
    </div>
    <div class="card card-form" style="display: none;">
        <div class="card-title" style="margin: 10px;">
            <h4>Form Add Tasks</h4>
        </div>
        <div class="card-body mb-3">
            <form action="{{ route('url.store', ['url' => 'task']) }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-6 mb-4">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Enter task title" required>
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Provide task details"
                            required></textarea>
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="priority">Priority</label>
                        <select name="priority" id="priority" class="form-control" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="due_date">Due Date</label>
                        <input type="datetime-local" name="due_date" id="due_date" class="form-control"
                            placeholder="Select due date">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category" class="form-control"
                            placeholder="Enter task category">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="user_id">User ID</label>
                        <input type="number" name="user_id" id="user_id" class="form-control"
                            placeholder="Enter user ID" value="{{ $data['user'] }}" readonly>
                    </div>

                    <div class="form-group col-10 mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <div class="form-group col-2 mb-4">
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-fw fa-sync"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="card card-tabel">
        <div class="card-body mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">User</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['tasks'] as $task)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->updated_at }}</td>
                            <td>{{ $task->user_id }}</td>
                            <td>{{ $task->category }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#editModal"
                                    data-id="{{ Crypt::encrypt($task->id) }}"
                                    class="btn btn-md btn-outline-info edit"><i class="far fa-fw fa-edit"></i></a>
                                <form
                                    action="{{ route('url.destroy', ['url' => 'task', 'id' => Crypt::encrypt($task->id)]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Do you want to delete the task.?');" type="submit"
                                        class="btn btn-md btn-outline-danger"><i
                                            class="fas fa-fw fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('url.update', ['url' => 'task']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6 mb-4">
                            <label for="etitle">Title</label>
                            <input type="hidden" name="eid" id="eid" class="form-control">
                            <input type="text" name="etitle" id="etitle" class="form-control"
                                placeholder="Enter task title" required>
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="edescription">Description</label>
                            <textarea name="edescription" id="edescription" class="form-control" rows="3"
                                placeholder="Provide task details" required></textarea>
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="estatus">Status</label>
                            <select name="estatus" id="estatus" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="epriority">Priority</label>
                            <select name="epriority" id="epriority" class="form-control" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="edue_date">Due Date</label>
                            <input type="datetime-local" name="edue_date" id="edue_date" class="form-control"
                                placeholder="Select due date">
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="ecategory">Category</label>
                            <input type="text" name="ecategory" id="ecategory" class="form-control"
                                placeholder="Enter task category">
                        </div>

                        <div class="form-group col-6 mb-4">
                            <label for="euser_id">User ID</label>
                            <input type="number" name="euser_id" id="euser_id" class="form-control"
                                placeholder="Enter user ID" value="{{ $data['user'] }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
