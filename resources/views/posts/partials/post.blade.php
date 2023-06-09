<html>
    <head>
    <style>
        .like-button {
            background-color: #4285f4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="card shadow">
  <div class="card-body">

    <h4 class="card-title">
    	{{ $post->title }}
    </h4>

    <small class="text-muted">
    	Posted by: <b>{{ $post->owner->name }}</b> on {{ $post->created_at->format('M d, Y H:i:s') }}
    </small>

    <p class="card-text">
    	{{ $post->body }}
    </p>

    <p class="card-text">
    	<img src="{{ asset('img/'.$post->img)  }}" width="200" height="150" alt="{{ $post->title }} ">
    </p>

    {{-- <button class="like-button" onclick="like()">&#128077; </button>

    <p id="like-count">0 Likes</p>

    <script>
      var likeCount = 0;

      function like() {
        likeCount++;
        document.getElementById('like-count').textContent = likeCount + ' Likes';
      }
    </script> --}}

    <hr>
    @include('posts.partials.comments')
    <a href="{{ route('home') }}" class="btn btn-default">Back</a>

    @if (auth()->id() == $post->owner->id )
    <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger">Delete</a>
    @endif
  </div>
</div>
</body>
</html>
