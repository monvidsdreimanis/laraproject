this is show
<br>
{{$post->title}}

<h2>Comments</h2>
<ul>
@foreach($post->comments as $comment)
    <li>{{ $comment->author_name . ': ' . $comment->body }}</li>
@endforeach
</ul>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('comments.store') }}" method="POST">
@csrf
Author : <input type="text" name="author_name" value="{{ old('author_name')}}">
Body : <input type="text" name="body" value="{{ old('body')}}">
<input type="hidden" name="post_id" value="{{ $post->id }}">
<input type="submit">
</form>