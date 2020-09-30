<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Professor's page</title>
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
<!--start back-->
<div class="back">
  <div class="overlay"></div>
  <div class="container ">
  
   <div class="row row-cols-1 row-cols-md-2 flex-lg-column">
      <div class="col mb-4">
        <div class="card">
          <div class="card-body">
            <a href="{{route('cour.index')}}">
            <i class="fas fa-plus"></i>
            <h5 class="card-title"> 
                Create Course</h5>
              </a>
            
              
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
         
          <div class="card-body">
            <a href="#">
            <i class="fas fa-spell-check"></i>
            <h5 class="card-title">  Consulting Solution</h5>
          </a>
            
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
          <div class="card-body">
            <a href="{{route('browse.index')}}">
            <i class="fas fa-eye"></i>
            <h5 class="card-title">  Browse Course</h5>
          </a>
            
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
          
          <div class="card-body">
            <a href="{{route('cour.index')}}">
            <i class="fas fa-arrow-circle-up"></i>
            <h5 class="card-title">  Update</h5>
          </a>
            
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
</div>



<!--end back-->



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