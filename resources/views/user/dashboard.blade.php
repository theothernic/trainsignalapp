@extends('app')
@section('title', $page->title)


@section('content')
    <div class="container">
        <header>
            <div class="ct">
                <h1>{{ $page->title }}</h1>
            </div>
        </header>

        <div id="body">
            <div class="ct">
                This is the user dashboard.
            </div>

        </div>

    </div>

@endsection
