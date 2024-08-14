<!DOCTYPE html>
<html>
<head>
    <title>Create Document</title>
</head>
<body>
    <h1>Create Document</h1>
    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="document">Document:</label>
            <input type="file" name="document" id="document" required>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
