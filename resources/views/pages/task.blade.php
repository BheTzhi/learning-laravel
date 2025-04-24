@extends('layouts.app')

@yield('content')
<div class="content">
    <div class="col-12 mb-4">
        <a class="btn btn-outline-primary adds"><i class="fas fa-plus"></i> Add Task</a>
    </div>
    <div class="card card-form" style="display: none;">
        <div class="card-title" style="margin: 10px;">
            <h4>Form Add Tasks</h4>
        </div>
        <div class="card-body mb-3">
            <form action="" method="post">
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
