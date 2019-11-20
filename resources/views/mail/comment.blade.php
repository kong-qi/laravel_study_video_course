<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>评论通知</title>
</head>
<body>
<h3>您的文章 <a href="{{ route('article.show',['article'=>$article->id]) }}">{{ $article->name }}</a> 有评论</h3>
<div style="font-size: 14px;">{{ $comment->content }},来自:{{$comment->user['name']}},{{ $comment->created_at }}</div>
</body>
</html>
