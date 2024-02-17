<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.8); box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kelas">Kelas</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
            @auth
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>

                <ul class="dropdown-menu">
                    <a href="/dashboard"><button type="button" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Dashboard</button></a>
                    <a href="/home"><button type="button" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Home</button></a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                </ul>
            </li>
@else
<li class="nav-item">
    <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
        @endauth
    </ul>
    </div>
</nav>
