<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">
    
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
            <h3><span>Courses</span></h3>

            
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus"></i>  add course
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('cour.store') }}">
      @csrf
        <label for="">course title</label> <input id="titre_cour" class="form-control" type="text" placeholder="title" name="titre_cour"><br>
        <label for="">course description</label> <textarea id="description" class="form-control" type="textarea" placeholder="description" name="description"></textarea>
           
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>



<div class="row row-cols-1 row-cols-md-2 colorcard">

  @foreach($cours as $cour)
  @if($cour->enseignant_id==Auth::guard('enseignant')->user()->id)
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><a href="/cours/{{$cour->id}}">{{$cour->titre_cour}}</a></h5>
        <p class="card-text">{{$cour->description}}</p>

        <h7><a href="/cours/{{$cour->id}}">Add Content <i class="fas fa-plus"></i></a> </h7></br>
        <h7><a href="/{{$cour->id}}">View  <i class="fas fa-eye"></i></a> </h7></br>
       <form action="{{route('cour.destroy',$cour->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete  <i class="fas fa-trash-alt"></i></button>
        </form>
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
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>