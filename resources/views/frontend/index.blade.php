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
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Recent posts</h2>
                </div>
            </div>
            <!-- post -->
            @if ($recentposts != null)
                
                @foreach ($recentposts as $post)
                    
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="{{ route('postInfo', ['slug' => $post->slug]) }}"><img src="{{ $post->featured }}" alt="{{ $post->title }}"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('categoryPosts', ['id' => $post->category->id]) }}">{{ $post->Category->name }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ route('postInfo', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>{{ $thirdpost->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- /post -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Lifestyle</h2>
                </div>
            </div>
            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-9.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Fashion & Travel</h2>
                </div>
            </div>
            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-10.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Travel</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->

            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-12.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->

            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-13.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Travel</a>
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Technology & Health</h2>
                </div>
            </div>
            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-4.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Health</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->

            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-1.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Travel</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->

            <!-- post -->
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-3.jpg') }}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /post -->
        </div>
        <!-- /row -->
    </div>
@endsection

@section('content2')
    <div class="col-md-8">
        <!-- post -->
        <div class="post post-row">
            <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-13.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Travel</a>
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>20 April 2018</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-row">
            <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-1.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Travel</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>20 April 2018</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-row">
            <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-5.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>20 April 2018</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-row">
            <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-6.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Fashion</a>
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>20 April 2018</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-row">
            <a class="post-img" href="blog-post.html"><img src="{{ asset('img/post-7.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Health</a>
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                <ul class="post-meta">
                    <li><a href="author.html">John Doe</a></li>
                    <li>20 April 2018</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
            </div>
        </div>
        <!-- /post -->

        <div class="section-row loadmore text-center">
            <a href="#" class="primary-button">Load More</a>
        </div>
    </div>
@endsection