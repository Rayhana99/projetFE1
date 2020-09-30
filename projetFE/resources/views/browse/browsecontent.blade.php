<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson </title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/all.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css" >
    
    
</head>
<body>

<!--start navbar-->
<nav class="navbar navbar-expand-lg navbar-light  bg-white shadow-sm">
    <a class="navbar-brand" href="{{ url('/enseignants') }}">
            <span>E-</span><span>Learning</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{ url('/enseignants') }}">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
         
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->nom }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>





        </div>
      </nav>
      <!--end navbar-->

<div class="course  position-ref full-height">
<div class="container">


<a href="/browse/index" class="return"><- back to the course</a>




<h4>Lessons :</h4>

<div class="row row-cols-1 row-cols-md-2">
@foreach($courss->lecons as $lecon)
  <div class="col mb-4 colorcard">
    <div class="card ">
      <div class="card-body">
      <h5 class="card-title">Lesson Title:{{$lecon->titre_lecon}}</h5>
    <p class="card-text">Resource Title :{{$lecon->titre_ressource}}</p>
    <p class="card-text"><a href='/download/{{$lecon->contenu}}'> Contenu :{{$lecon->contenu}} </br>
    download<i class="fas fa-file-download"></i><a> </p>
  
      </div>
    </div>
  </div>
  @endforeach  
</div>
     


 

  <h4>TPs :</h4>
 
  <div class="row row-cols-1 row-cols-md-2">
  @foreach($coursss->examens as $examen)
  @if(($examen->type)=='2')
  <div class="col mb-4 ">
    <div class="card text-white bg-info">
      <div class="card-body">
      <h5 class="card-title">TP Title :{{$examen->examen_sujet}}</h5>
    <p class="card-text">Resource Title : {{$examen->titre_ressource}}</p>
    @foreach($examen->exercices as $exercice)
    <p class="card-text">Exercise Number : {{$exercice->num_exercice}} </p>
    <p class="card-text"><a href='/download/{{$exercice->contenu}}'> Contenu :{{$exercice->contenu}}</br> 
    dowbload <i class="fas fa-file-download"></i><a> </p>
    @endforeach
 
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
     

  <h4>Exams :</h4>

 

  <div class="row row-cols-1 row-cols-md-2">
  @foreach($coursss->examens as $examen)
  @if(($examen->type)=='1')
  <div class="col mb-4 ">
    <div class="card text-white bg-info">
      <div class="card-body">
      <h5 class="card-title">Exam Title :{{$examen->examen_sujet}}</h5>
    <p class="card-text">Resource Title : {{$examen->titre_ressource}}</p>
    @foreach($examen->exercices as $exercice)
    <p class="card-text">Exercise Number : {{$exercice->num_exercice}}</p>
    <p class="card-text"><a href='/download/{{$exercice->contenu}}'> Contenu :{{$exercice->contenu}} </br>
     download<i class="fas fa-file-download"></i><a> </p>
    @endforeach
   
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>


</div>
</div>


 <!--start footer-->
 <footer>
    copyright 2020 E-Learning Group
    </footer>
  <!--end footer-->




    
  <script type="text/javascript" src="{{ URL::asset('js/jquery-3.5.1.slim.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>