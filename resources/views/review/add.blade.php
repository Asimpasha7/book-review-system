<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-3">
    <h2>Create Review</h2>
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Book:</label>
            <select class="form-control" id="title" name="title" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="review">Review:</label>
            <input type="text" class="form-control" id="review" name="review" required>
        </div>
       
        <div class="form-group">
            <label for="ratings">Ratings:</label>
            <input type="number" class="form-control" min="1" id="ratings" name="ratings" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   


   
    $(document).ready(function() {
        $('#add_item').click(function() {
            $('#invoice_items').append('<div class="row invoice-item"><div class="col-md-6"><div class="form-group"><label for="item_description">Item Description:</label><input type="text" class="form-control" name="item_description[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_quantity">Quantity:</label><input type="number" class="form-control" name="item_quantity[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_amount">Amount:</label><input type="number" class="form-control" name="item_amount[]" required></div></div><div class="col-md-2 align-self-end"><button type="button" class="btn btn-lg btn-danger remove-item">-</button></div></div>');
        });

        // Dynamically added button click event
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.invoice-item').remove();
        });
    });
</script>


</body>
</html>
