<!--STYLED IN BANNER SCSS-->
<div class="banner d-flex justify-content-between align-items-center">
        <a href="{{route('home')}}"><img src="{{asset('storage/images/dc-logo.png')}}"></a>
        <div class="logotitle">
          <h2><img class="logo" src="{{asset('storage/images/nea-red.png')}}" style="width: 40px; margin-right: 5px; margin-top: -5px;" ><span>D</span>igital <span>A</span>rchive of <span>D</span>avidson <span>A</span>rchaeology</h2>

        </div>
        
</div>

<nav class="navbar w-100 navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-house"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link navfont dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Query the Database
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item navfont" href="/query/bycollection">Collection Queries</a></li>
              <li><a class="dropdown-item navfont" href="/query/byartifacttype">Artifact Queries</a></li>

            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link navfont disabled " aria-current="page" href="#">About the Database</a>
          </li>
          @if(Auth::check())
          @if(in_array(Auth::user()->user_type,["admin","owner"]))
          <li class="nav-item dropdown">
            <a class="nav-link navfont dropdown-toggle" href="{{route('admin.dashboard')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-pen-to-square"></i>Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item navfont" href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li><a class="dropdown-item navfont" href="{{route('collections')}}">Collections</a></li>
              <li><a class="dropdown-item navfont" href="{{route('verify.data')}}">Verify Data</a></li>
            </ul>
          </li>
          @endif
        @endif
        
        @if(Auth::check())
        <li class="nav-item ">
          <a class="nav-link navfont" aria-current="page" href="{{route('typeselect')}}"><i class="fa-regular fa-square-plus"></i>Add Artifact</a>
        </li>
        <li>
          <a class="nav-link navfont" aria-current="page" href="/enteredby/{{Auth::user()->id}}"><i class="fa-solid fa-clipboard-list"></i>Saved Artifacts</a>
        </li>
        @if(Auth::user()->user_type === 'owner')
          <li>
          <a class="nav-link navfont" aria-current="page" href="/owner/manageusers/"><i class="fa-solid fa-users"></i>Manage Users</a>
        </li>
        @endif
        @endif
        </ul>
        @if(Auth::check())
        <h3 class="text-white me-3">{{Auth::user()->name}}</h3>
        <form action="{{route('logout')}}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn navfont btn-light ms-1">Logout</button>
      </form>
        @else
        <a href="{{route('login')}}"><button class="btn navfont btn-light ms-1" type="submit">Login</button></a>
        @endif

      </div>
    </div>
  </nav>
 