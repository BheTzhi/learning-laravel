@extends('layouts.app')

@yield('content')
<div class="content">
    <div class="col-12 mb-4">
        <a class="btn btn-outline-primary adds"><i class="fas fa-plus"></i> Add Task</a>
    </div>
    <div class="card card-form" style="display: none;">
        <div class="card-body mb-3">
            ini form
        </div>
    </div>
    <div class="card card-tabel">
        <div class="card-body mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
