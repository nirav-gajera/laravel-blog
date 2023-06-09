<h4 class="card-title">Comments</h4>

@include('posts.partials.add_comment')

@forelse($post->comments as $comment)
	<div class="card-text">
		<b>{{ $comment->owner->name }}</b> said
		<small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
		<p>{{ $comment->body }}</p>

		@include('posts.partials.add_reply')
		@include('posts.partials.replies')
	</div>
	{!! $loop->last ? '' : '<hr>' !!}
@empty
	<p class="card-text">no comments</p>
@endforelse
