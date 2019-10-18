@extends('main')

@section('content')

    <div class="header">
        <h2>Newest Issues</h2>
    </div>
    @each('partials/issue.single', $newest_issues, 'issue')


    <div class="header">
        <h2>Featured Issues By <strong class="highlight">Language</strong></h2>
    </div>

    @foreach ($boards as $board)
        <div class="box">
            <div class="title"><a href="{{ route('issues', ['filter' => ['language' => $board['language']]]) }}">{{ $board['language'] }}</a></div>
            <ul>
                @each('partials/issue.grouped', $board['issues'], 'issue')
            </ul>
        </div>
    @endforeach

    <div class="header">
        <h2>Featured Issues For <strong class="highlight">Beginners</strong> </h2>
    </div>

    @foreach ($second_level_boards as $board)
        <div class="box">
            <div class="title"><a href="{{ route('issues', ['filter' => ['label' => $board['label']]]) }}" title="See more Issues with this Label">{{ $board['label'] }}</a></div>
            <ul>
                @each('partials/issue.grouped', $board['issues'], 'issue')
            </ul>
        </div>
    @endforeach

@endsection
