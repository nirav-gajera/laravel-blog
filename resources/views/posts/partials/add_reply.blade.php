<form action="{{ route('replies.store', $comment->id) }}" method="POST" class="mb-2">
	{{ csrf_field() }}

	<div class="input-group">
	  <input name="new_reply"
             type="text" 
             class="form-control" 
             placeholder="write your reply.."
	  	required>

	  <div class="input-group-append">
	    <button class="btn btn-primary" type="submit">reply</button>
	  </div>

	</div>

</form>
