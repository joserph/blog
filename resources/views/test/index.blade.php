<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $article->title }}</title>
</head>
<body>
	<h1>{{ $article->title }}</h1>
	<hr>
	<p>{{ $article->content }}</p>
	<hr>
	<p>{{ $article->user->name }} | {{ $article->category->name }}</p>
	<p>
		@foreach($article->tags as $tag)
			{{ $tag->name }}
		@endforeach
	</p>
</body>
</html>
