<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Content</title>
    
    <link rel="stylesheet" href="css/all.css">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/all.css') }}" rel="stylesheet" type="text/css" >

    
    
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
        <div class="container cont-width">
           
   

<h4> <i class="fas fa-sticky-note"></i> <span> Lessons : </span> </h4>
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#lesson">
<i class="fas fa-plus"></i>  add lesson
</button>

<!-- Modal -->
<div class="modal fade" id="lesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lesson">Add lesson</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        <form method="POST" action="{{ route('lecon.store', $cour->id) }}" enctype="multipart/form-data">
        @csrf
        <label class="lab">resource title</label> <input id="titre_ressource" class="form-control" type="text" placeholder="resource title" name="titre_ressource"><br>
        <label class="lab">lesson Title</label> <input id="titre_lecon" class="form-control" type="text" placeholder="lesson Title" name="titre_lecon">
        <label class="lab">Contenu</label>
    <input type="file" class="form-control-file" id="contenu"name="My_File">
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>

@foreach($courss->lecons as $lecon)
<h6>- {{$lecon->titre_lecon}} </h6>


@endforeach


<h3><{{$cour->titre_cour}}  Course</h3></br>
 <h4> <i class="fas fa-pen-alt" ></i> <span>  TP \ Examan : </span> </h4>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#tp">
<i class="fas fa-plus"></i>  add TP \ Examan
</button>

<!-- Modal -->
<div class="modal fade" id="tp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tp">Add TP\ Examan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('examen.store', $cour->id) }}" enctype="multipart/form-data">
        @csrf
        <label class="lab">resource title</label> <input id="titre_ressource" name="titre_ressource" class="form-control" type="text" placeholder="resource title"><br>
        <label class="lab">Examan Title \ Tp Title</label> <input id="examen_sujet" name="examen_sujet" class="form-control" type="text" placeholder=""><br>
       
        <label class="lab">Type:</label><br>
         <label class="lab">Exam </label><input type="radio"  name="type" value="1"><br>
         <label class="lab"> Tp </label><input type="radio"  name="type" value="2"><br>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>


@foreach($coursss->examens as $examen)
<h6><a href="/cours/exam/{{$examen->id}}">- {{$examen->examen_sujet}} </a></h6>


@endforeach
 
 

 


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