@extends('main')

@section('content')
    <div class="header">
        <h2>All labels</h2>
    </div>
        @foreach ($labels as $key => $label)
        <div class="box">
            <div class="title">
                <span class="issue-number">#{{ $key + 1 }}</span>
                <a href="{{ route('label.list', $label->name) }}">{{ $label->name }}</a>
            </div>
        </div>
        @endforeach
@endsection