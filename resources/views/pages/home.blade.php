					@extends('layouts.master')

					@section('title', 'Главная')

					@section('content')
					@forelse($list as $post)
					<!-- Post -->
						<article class="box post post-excerpt">
							<header>
								<!--
									Note: Titles and subtitles will wrap automatically when necessary, so don't worry
									if they get too long. You can also remove the <p> entirely if you don't
									need a subtitle.
								-->
								<h2><a href="{{ url('/article/' . $post->uri) }}">{{ $post->title }}</a></h2>
								@if(!empty($post->subtitle))
								<p>{{ $post->subtitle }}</p>
								@endif
							</header>
							<div class="info">
								<!--
									Note: The date should be formatted exactly as it's shown below. In particular, the
									"least significant" characters of the month should be encapsulated in a <span>
									element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
									Oh, and if you don't need a date for a particular page or post you can simply delete
									the entire "date" element.

								-->
								<span class="date"><span class="month">{{ date('M', $post->cteated_at_unix) }}</span> <span class="day">{{ date('j', $post->cteated_at_unix) }}</span><span class="year">, {{ date('Y', $post->cteated_at_unix) }}</span></span>
								<!--
									Note: You can change the number of list items in "stats" to whatever you want.
								-->
								<ul class="stats">
									<li><a href="#" class="icon fa-comment">16</a></li>
									<li><a href="#" class="icon fa-heart">32</a></li>
									<li><a href="#" class="icon fa-twitter">64</a></li>
									<li><a href="#" class="icon fa-facebook">128</a></li>
								</ul>
							</div>
							@if(!empty($post->image))
							<a href="#" class="image featured"><img src="{{ url($post->image) }}" alt="{{ $post->title }}" /></a>
							@endif
							{{!! $post->intro !!}}
						</article>
					@empty
					<p>На данный момент постов нет</p>

					@endforelse
					{{ $list->links('vendor.pagination.default') }}

					@endsection