@extends('layouts.app')

@section('content')
    <body>

    <div class="container">
        <div class="flex-center position-ref full-height">
            @if (Auth::user()->isAdmin)
                <div class="content">
                    <div class="title m-b-md">Admin</div>
                    <div class="links">
                        <a href="/users">Users</a>
                        <a href="/exams">Exams</a>
                    </div>
                </div>
            @else
                <div class="content">
                    <div class="title m-b-md">Student Panel</div>
            </div>
            @endif
        </div>
    </div>
    </body>
@endsection
