<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Books</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Edit Books</h2>

        <form action="{{ route('book.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>

            <div class="form-group">
                <label for="publication">Publication:</label>
                <input type="text" class="form-control" id="publication" name="publication" value="{{ $book->publication }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" min="1" id="quantity" name="quantity" value="{{ $book->quantity }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add_item').click(function() {
                $('#invoice_items').append('<div class="row invoice-item"><div class="col-md-6"><div class="form-group"><label for="item_description">Item Description:</label><input type="text" class="form-control" name="item_description[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_quantity">Quantity:</label><input type="number" class="form-control" name="item_quantity[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_amount">Amount:</label><input type="number" class="form-control" name="item_amount[]" required></div></div><div class="col-md-2 align-self-end"><button type="button" class="btn btn-lg btn-danger remove-item">-</button></div></div>');
            });

            $(document).on('click', '.remove-item', function() {
                $(this).closest('.invoice-item').remove();
            });
        });
    </script>

</body>

</html>