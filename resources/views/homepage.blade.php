<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>UTAS Computer Rental Services Homepage</title>
</head>
<body>
<!-- Bootstrap .navbar-brand for your company, product, or project name. -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- As a Heading -->
        <span class="navbar-brand mb-0 h1">UCR</span>
        <!-- As a link -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- Add the .active class on .nav-link to indicate the current page.
                     Please note that you should also add the aria-current attribute on the active .nav-link.-->
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row row-cols-2">
        <div class="col-9" id="home-welcome-box">
            <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/UCR-Rental-Main-Page-Welcome-Picture.png"
                 class="img-fluid" id="home-welcome-pic" alt = "UCR Rental Welcome Picture">
        </div>
        <div class="col-3">
            <form>
                <div class="mb-2">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-2">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="btn btn-primary" href="#" role="button">Sign up</a>
            </form>
        </div>
    </div>
</div>

<div class="mt-4 container-md" id="search-module">
    <div class="row">
        <form>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Computer Band, like: Apple"
                       aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </div>
        </form>
    </div>
    <div class="row text-center">
        <div class="col gy-3">
            <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/iMac.jpeg"
                 class="img-fluid img-detail" alt = "New iMac">
            <h2>New iMac</h2>
            <p class="small-gap">Apple M1 chip, 256GB SSD, 8GB unified memory, 24-inch, Blue</p>
            <p class="small-gap">$5 / day</p>
        </div>
        <div class="col gy-3">
            <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/iMac-Older.jpeg"
                 class="img-fluid img-detail" alt = "iMac 2018">
            <h2>iMac 2018</h2>
            <p class="small-gap">Intel Core i5, 1T SSD, 32GB memory, 27-inch, Silver</p>
            <p class="small-gap">$5 / day</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
