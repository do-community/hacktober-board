@extends('main')

@section('content')
    <div class="header">
        <h2>Featured Issues in the <strong class="highlight">{{ $name }}</strong> Board</h2>
    </div>

    {{ $issues->links() }}

    @each('partials/issue.single', $issues, 'issue')


    {{ $issues->links() }}

@endsection
