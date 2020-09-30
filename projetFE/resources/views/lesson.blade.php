<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>

<!--start navbar-->
<nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
            <span>E-</span><span>Learning</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <!--<a class="nav-link" href="#">About us </a>-->
            </li>
            
          </ul>
        </div>
      </nav>
      <!--end navbar-->

<div class="lesson position-ref lesson-height">
<div class=" wrapper lesson-detail">

<h1>lesson {{}}</h1>
        <p class="type"> Resource Title :{{}}</p>
        <p class="base"> Lesson Title :{{}}</p>
        <p class="base"> Contenu :{{}}</p>


        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Info card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


        <h1>TP{{}}</h1>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('enseignant.login.submit') }}">Register</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('enseignant.register') }}">Register as professor</a>
                    @endif
                @endauth
            </div>
        @endif



        <h1>Exam{{}}</h1>






</div>
</div>
<a href="#" class="return"><- back to the course</a>


 <!--start footer-->
 <footer>
    copyright 2020 E-Learning Group
    </footer>
  <!--end footer-->
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>