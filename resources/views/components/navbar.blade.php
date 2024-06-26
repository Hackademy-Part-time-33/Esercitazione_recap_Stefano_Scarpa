            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{route('homepage')}}">Start Bootstrap</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{route('homepage')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                            @guest
                                <a class="text-white mx-2 nav-link" href="{{ route('login') }}"><i class="bi bi-person-circle"></i></a>
                            @else
                            <span class="text-white nav-link">Benvenuto, <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                            <li class="nav-item"><a class="nav-link" href="{{route('homepage')}}">Dashboard</a></li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="text-danger mx-2 nav-link" type="submit">Logout</button>
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>