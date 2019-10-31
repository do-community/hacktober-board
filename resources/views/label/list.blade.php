@extends('main')

@section('content')
    <div class="header">
        <h2>All Labels</h2>
    </div>

    <div class="labels">
        <ul>
            @foreach ($labels as $label)
                <li><a href="{{ route('labels.show', [$label->slug]) }}" title="View {{ $label->name }} Issues">{{ $label->name }}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
