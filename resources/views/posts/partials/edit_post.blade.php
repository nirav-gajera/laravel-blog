<form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="post" >
    {{ csrf_field() }}

    {{-- <input id="post_id" type="hidden" class="form-control" name="post_id" value="{{ old('id', $post->id) }}"> --}}

    <div class="form-group">
      <label for="title">Post title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" placeholder="write post title here.." required />

        @if ($errors->has('title'))
            <small class="text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    <div class="form-group">
      <label for="body">Post body</label>
      <textarea class="form-control" name="body" id="body" rows="3" placeholder="write post body here.." required style="resize: none;">{{ $post->body }}</textarea>

        @if ($errors->has('body'))
            <small class="text-danger">{{ $errors->first('body') }}</small>
        @endif
    </div>

    <div class="form-group">
        <label for="img">Image</label>

        <div class="col-md-6">
            @if ($post->img)
                <img src="{{ asset('img/' . $post->img) }}" alt="{{ $post->name }}" style="max-width: 130%">
            @else
                <p>No image uploaded yet.</p>
            @endif
            <div>
                <span id="file-name">
                    @if ($post->img)
                        {{ $post->img }}
                    @endif
                </span>
                <input id="img" type="file" class="form-control-file" name="img">
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('home') }}" class="btn btn-default">Back</a>
    </div>

</form>
