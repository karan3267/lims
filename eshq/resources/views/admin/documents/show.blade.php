<!DOCTYPE html>
<html>
<head>
    <title>{{ $document->title }}</title>
</head>
<body>
    <h1>{{ $document->title }}</h1>
    <p>Version: {{ $document->version }}</p>
    <p>Status: {{ $document->status }}</p>
    <p>Created At: {{ $document->created_at }}</p>
    <p>Description: {{ $document->description }}</p>
    </body>
</html>
