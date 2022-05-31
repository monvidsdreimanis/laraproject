<a href="{{ route('posts.create')}}">create</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->author_name}}</td>
            <td>
                <a href={{ route('posts.destroy', ['post'=>$post->id])}}>Delete</a>
                <a href={{ route('posts.edit', ['post'=>$post->id])}}>labot</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

