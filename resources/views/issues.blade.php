@extends('main')

@section('content')
    <div class="header">
        <h2>All Issues Board</h2>
    </div>

    {{ $issues->links() }}

    @each('partials/issue.single', $issues, 'issue')

    {{ $issues->links() }}

@endsection
