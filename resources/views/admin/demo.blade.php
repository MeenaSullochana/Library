<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
            <div class="container">
                <a class="navbar-brand" href="javascript:void(0)">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav mx-auto d-flex justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-primary" type="button">Contact</button>
                    </form>
                </div>
            </div>
        </nav>
    </section>
    <!-- jsdg -->
    <section>
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="la.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="chicago.jpg" alt="Chicago" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="ny.jpg" alt="New York" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <section class="demo" id="demo">
        <div class="container d-flex justify-content-center">
            <div class="col-md-4">
                <div class="icon icon-shape icon-shape-primary rounded-circle me-2 me-md-0 mb-2">
                    <span class="far fa-grin-hearts"></span>
                </div>
                <span class="counter display-3 text-primary d-block">500</span>
                <span class="h5 text-gray">Happy people</span>
            </div>
            <div class="col-md-4">
                <div class="icon icon-shape icon-shape-primary rounded-circle me-2 me-md-0 mb-2">
                    <span class="far fa-grin-hearts"></span>
                </div>
                <span class="counter display-3 text-primary d-block">500</span>
                <span class="h5 text-gray">Happy people</span>
            </div>
            <div class="col-md-4">
                <div class="icon icon-shape icon-shape-primary rounded-circle me-2 me-md-0 mb-2">
                    <span class="far fa-grin-hearts"></span>
                </div>
                <span class="counter display-3 text-primary d-block">500</span>
                <span class="h5 text-gray">Happy people</span>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<style>
.demo {
    background-color: yellow;
    padding: 50px;
}
</style>