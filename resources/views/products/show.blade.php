<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Products || index</title>
</head>
<body>

<div class="container">

    <div class="row mt-3">
        <div class="col-sm-12">
            <h1>商品詳細</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{ $product->jan }}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{ $product->name }}
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12 bg-secondary p-2 text-center m-2">
            <img src="data:{{ $mime }};base64,{{ $enc_img }}">
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            {!! $product->spec !!}
        </div>
    </div>

</div>

<style type="text/css">
    body {
        font-size: 12px;
    }
</style>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
