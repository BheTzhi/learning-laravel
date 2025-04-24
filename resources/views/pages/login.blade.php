@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="login-card">
            <div class="card mb-3">
                <div class="card-header border-dark bg-primary text-white text-center"><b>Masuk / Registerasi</b></div>
                <div class="card-body">
                    <h6 class="text-center"><b>Pilih dibawah ini:</b></h6>

                    <a href="{{ route('social.login', 'github') }}" class="btn btn-lg" title="Github">
                        <img src="https://cdn.simpleicons.org/github?viewbox=auto" width="20" alt="Github">
                    </a>
                    <a href="{{ route('social.login', 'facebook') }}" class="btn btn-lg" title="Facebook">
                        <img src="https://cdn.simpleicons.org/facebook?viewbox=auto" width="20" alt="Facebook">
                    </a>
                    <a href="{{ route('social.login', 'google') }}" class="btn btn-lg" title="Google">
                        <img src="https://cdn.simpleicons.org/google?viewbox=auto" width="20" alt="Google">
                    </a>
                    <a href="{{ route('social.login', 'x') }}" class="btn btn-lg" title="X">
                        <img src="https://cdn.simpleicons.org/x?viewbox=auto " width="20" alt="X">
                    </a>
                    <hr>
                    <p><i>Silahkan Masuk diatas</i></p>
                </div>
            </div>
        </div>
    </div>
