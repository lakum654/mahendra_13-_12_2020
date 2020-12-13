<table border="1">
	<tr>
		<th>Id</th>
		<th>Author</th>
		<th>Title</th>
		<th>Create At</th>
		<th>Action</th>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td>{{$post->id}}</td>
		<td>{{$post->user['name']}}</td>
		<td>{{$post->title}}</td>
		<td>{{$post->created_at}}</td>
		<td><a href="{{ url('posts/'.$post->id) }}">Delete</a></td>
	</tr>
	@endforeach
</table>