@extends('layout')

@section('content')
<div class="container">
    @foreach ($articles as $article)
    <pre>{{ $article->title }}
    @endforeach
</div>
@endsection