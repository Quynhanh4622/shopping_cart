<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Create Product</h1>
    <form class="pt-4" action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" class="form-control" name="price">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Thumbnail:</label>
            <input type="text" class="form-control" name="thumbnail">
        </div>
        <button class="btn btn-primary pt-4">Submit</button>
    </form>
</div>
</body>
</html>

