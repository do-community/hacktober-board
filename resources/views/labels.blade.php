@extends('main')

@section('content')
    <div class="header">
        <h2>Issues by Label</h2>
    </div>

    <div class="labels">
        <ul>
            @foreach ($labels as $label)
                <li><a href="{{ route('issues', ['filter' => ['label' => $label->name]]) }}" title="View {{ $label->name }} Issues">{{ $label->name }}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
