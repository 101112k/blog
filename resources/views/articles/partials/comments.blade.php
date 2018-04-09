@if ($errors->any())
	@foreach ($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
@endif

@if(session()->has('success'))
<p>{{ session()->get('success') }}</p>
@endif

<form action="{{ url('/article/comments') }}" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="article_id" value="{{ $post->id }}"
    <p><input type="text" name="name" placeholder="Enter your name..."></p>
    <p><textarea name="text" placeholder="Enter your comment..."></textarea></p>
    <p><button type="submit">Add</button></p>
</form>

@foreach($comments as $comment)
<ul>
<li>Name: {{$comment->name}}</li>
<li>{{$comment->text}}</li>
</ul>

@endforeach
{{$comments->links('vendor.pagination.default')}}