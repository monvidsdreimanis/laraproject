this is edit
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action={{route('posts.update', ['post' => $post->id])}} method="POST">
    @csrf
    <div>
        Title: <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        Body: <textarea type="text" name="body">{{ $post->body }}</textarea>
    </div>
    <div>
        Author: <input type="text" name="author_name" value="{{ $post->author_name }}">

    </div>

    <input type="submit" value="labot">

</form>

