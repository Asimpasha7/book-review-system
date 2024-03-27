<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Edit Review</h2>

        <form action="{{ route('review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Book:</label>
                <select class="form-control" id="title" name="title" required>
                    <option value="">Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $review->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="review">Review:</label>
                <input type="text" class="form-control" id="review" name="review" value="{{ $review->review }}" required>
            </div>
        
            <div class="form-group">
                <label for="ratings">Ratings:</label>
                <input type="number" class="form-control" min="1" id="ratings" name="ratings" value="{{ $review->rating }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

</body>

</html>