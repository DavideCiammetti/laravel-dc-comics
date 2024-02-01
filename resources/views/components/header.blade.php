<header id="header">
    <nav  class="navbar">
        <ul class="list-container d-flex justify-content-between me-4 align-items-center">
            <li class="hover">
                <a href="/">Home Page</a>
            </li>
            <li class="hover">
                <a href="{{ route('comics_management.index') }}">comics list</a>
            </li>
            <li class="hover">
                <a href="{{route('comics_management.create')}}">create a new comic</a>
            </li>
        </ul>
    </nav>
   </header>