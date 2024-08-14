<!DOCTYPE html>
<html>
<head>
    <title>Approve Document</title>
</head>
<body>
    <h1>Approve Document</h1>
    <p>Title: {{ $document->title }}</p>
    <p>Version: {{ $document->version }}</p>
    <form method="POST" action="{{ route('documents.approve', $document) }}">
        @csrf
        <button type="submit" value="approve">Approve</button>
        <button type="submit" value="reject">Reject</button>
    </form>
</body>
</html>
