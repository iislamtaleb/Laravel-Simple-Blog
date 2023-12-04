<nav class="navbar navbar-expand-md bg-body py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img src="/storage/{{App\Models\TextWidget::getImage('header-logo')}}" style="height:100%; width:100%;">
                   
                    
                </svg></span><span>{{App\Models\TextWidget::getBlogName('blog-name')}}</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ route('show_category', $category->slug) }}">{{ $category->title }}</a>
                        @endforeach
                        

                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>
            @guest
                <a href="{{url('/login')}}"><button class="btn btn-primary" type="button">Login</button></a>
                <a href="{{url('/register')}}"><button class="btn btn-primary" type="button" style="margin-left: 20px;">Register</button></a>
            @endguest
            @auth
            <div style="display: flex; flex-direction: column; align-items:start;">
                <li class="nav-item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Illuminate\Support\Facades\Auth::user()->name;}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                       
                        <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>


                        
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        
                        

                    </div>
                </li>

                
            </div>
            @endauth

          






        </div>
    </div>
</nav>