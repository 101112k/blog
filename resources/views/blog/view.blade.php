<div class = "container">
	@foreach($articles as $article)
	<pre><strong>id:</strong> {{ $article->id }}
	<pre><strong>title:</strong> {{ $article->title }}
	<pre><strong>content:</strong> {{ $article->content }}
	<pre><strong>image:</strong> {{ $article->image }}
	<pre><strong>created at:</strong> {{ $article->created_at }}
	<pre><strong>updated at:</strong> {{ $article->updated_at }}
	@endforeach
</div>