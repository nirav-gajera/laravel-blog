<form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-2 mb-4">
 {{ csrf_field() }}

	<div class="input-group">
	  <input
	  	name="new_comment"
	  	type="text"
	  	class="form-control"
	  	placeholder="write your comment.."
	  	required>

	  <div class="input-group-append">
	    <button class="btn btn-primary" type="submit">Add Comment</button>
	  </div>

	</div>

</form>
