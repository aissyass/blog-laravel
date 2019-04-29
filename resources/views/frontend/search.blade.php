@extends('layouts.master')

@section('headerposts')
    <!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('postInfo', ['slug' => $firstpost->slug]) }}"><img style="height: 418px;" src="{{ $firstpost->featured }}" alt="{{ $firstpost->title }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('categoryPosts', ['id' => $firstpost->category->id]) }}">{{ $firstpost->Category->name }}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ route('postInfo', ['slug' => $firstpost->slug]) }}">{{ str_limit($firstpost->title, $limit = 75, $end = '...') }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>{{ $firstpost->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('postInfo', ['slug' => $secondpost->slug]) }}"><img style="height: 205px;" src="{{ $secondpost->featured }}" alt="{{ $secondpost->title }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('categoryPosts', ['id' => $secondpost->category->id]) }}">{{ $secondpost->Category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('postInfo', ['slug' => $secondpost->slug]) }}">{{ str_limit($secondpost->title, $limit = 75, $end = '...') }}t</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>{{ $secondpost->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('postInfo', ['slug' => $thirdpost->slug]) }}"><img style="height: 206px;" src="{{ $thirdpost->featured }}" alt="{{ $thirdpost->title }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('categoryPosts', ['id' => $thirdpost->category->id]) }}">{{ $thirdpost->Category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('postInfo', ['slug' => $thirdpost->slug]) }}">{{ str_limit($thirdpost->title, $limit = 75, $end = '...') }}t</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>{{ $thirdpost->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection

@section('content1')
    <div class="col-md-8">
		<div class="section-title">
			<h2 class="title">Search Posts</h2>
		</div>
		<!-- post -->
		@if ($search_post != null)
			@foreach ($search_post as $post)
				<div class="post post-row">
					<a class="post-img" href="{{ route('postInfo', ['slug' => $post->slug]) }}"><img src="{{ $post->featured }}" alt="{{ $post->title }}"></a>
					<div class="post-body">
						<div class="post-category">
							<a href="{{ route('categoryPosts', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
						</div>
						<h3 class="post-title"><a href="{{ route('postInfo', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
						<ul class="post-meta">
							<li><a href="author.html">John Doe</a></li>
							<li>{{ $post->created_at->diffForHumans() }}</li>
						</ul>
						<p>{{ str_limit($post->content, $limit = 150, $end = '...') }}</p>
					</div>
				</div>
			@endforeach
		@else
			<div class="col-md-6">
				<p>No Posts !</p>
			</div>
		@endif
		<!-- /post -->
    </div>
@endsection