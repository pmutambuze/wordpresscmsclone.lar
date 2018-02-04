@extends('layouts.main')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8">
            <article class="post-item post-detail">
                <div class="post-item-image">
                  @if ($post->image_url)
                    <img src="{{$post->image_url}}" alt="{{$post->title}}">
                  @endif
                </div>

                <div class="post-item-body">
                    <div class="padding-10">
                        <h1>{{ $post->title }}</h1>

                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name }}</a></li>
                                <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                <li><i class="fa fa-tags"></i>{!! $post->tags_html !!}</li>
                                <li><i class="fa fa-comments"></i><a href="#">{{ $post->commentsNumber('Comment') }}</a></li>
                            </ul>
                        </div>

                        {!! $post->body_html !!}

                    </div>
                </div>
            </article>

            <article class="post-author padding-10">
                <div class="media">
                  <div class="media-left">
                    <a href="{{ route('author', $post->author->slug) }}">
                      <img alt="{{ $post->author->name }}" width="100" height="100" src="{{ $post->author->gravatar() }}" class="media-object">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a></h4>
                    <div class="post-author-count">
                      <a href="#">
                          <i class="fa fa-clone"></i>
                          <?php $postCount = $post->author->posts()->published()->count() ?>
                          {{ $postCount }} {{ str_plural('post', $postCount) }}
                      </a>
                    </div>
                    {!! $post->author->bio_html !!}
                  </div>
                </div>
            </article>

            @include('blog.partials.comment')

        </div>
        @include('blog.partials.sidebar')
      </div>
  </div>
@endsection
