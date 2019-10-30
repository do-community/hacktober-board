@extends('main')

@section('content')
    <div class="header">
        <div class="header">
            <h2>Featured Issues
                @if ($filter) in the <strong class="highlight">{{ implode(' ',$filter) }}</strong> @endif
                Board</h2>
        </div>
    </div>

    {{ $issues->appends(['filter' => $filter])->links()}}

    @each('partials/issue.single', $issues, 'issue')

    {{ $issues->appends(['filter' => $filter])->links()}}

@endsection
