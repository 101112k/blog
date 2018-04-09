<!-- Recent Posts -->
                    <section class="box recent-posts">
                        <header>
                            <h2>Recent Posts</h2>
                        </header>
                        <ul>
                            @foreach(request()->attributes->get('articles') as $article)
                            <li><a href="{{ url('/article/'.$article->uri) }}">{{ $article->title }}</a></li>
                            @endforeach
                            
                        </ul>
                    </section>

                <!-- Recent Comments -->
                    <section class="box recent-comments">
                        <header>
                            <h2>Recent Comments</h2>
                        </header>
                        <ul>
                            @foreach(request()->attributes->get('comments') as $comment)
                            <li>{{ $comment->name }} on <a href="{{ url('/article/'.$article->uri) }}">{{ $comment->article()->first()->title }}</a></li>
                            @endforeach
                        </ul>
                    </section>