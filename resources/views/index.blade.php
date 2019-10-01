@extends('main')

@section('content')

    <div class="header">
        <h2>Featured Issues By <a href="#" class="highlight">Language</a></h2>
    </div>

    @foreach ($boards as $board)
    <div class="box">
        <div class="title"><a href="{{ route('board.list', $board['language']) }}">{{ $board['language'] }}</a></div>
        <ul>
            @each('issue', $board['issues'], 'issue')
        </ul>
    </div>
    @endforeach

    <div class="header">
        <h2>Featured Issues For <a href="#" class="highlight">Beginners</a> </h2>
    </div>

    @foreach ($second_level_boards as $board)
        <div class="box">
            <div class="title"><a href="{{ route('label.list', $board['label']) }}" title="See more Issues with this Label">{{ $board['label'] }}</a></div>
            <ul>
                @each('issue', $board['issues'], 'issue')
            </ul>
        </div>
    @endforeach

@endsection