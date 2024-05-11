<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">
            @if(Auth::check())
                @php
                    $userRole = Auth::user()->role;
                    $userName = Auth::user()->name;
                @endphp

                @if($userRole === 'direktur')
                    <center><h1 class="" style="font-size: 40px; text-transform: uppercase;">SELAMAT DATANG DIREKTUR PAK {{ Auth::user()->name }}</h1></center>
                @elseif($userRole === 'staff')
                    <center><h1 class="" style="font-size: 40px; text-transform: uppercase;">SELAMAT DATANG STAFF PAK {{ Auth::user()->name }}</h1></center>
                @elseif($userRole === 'finance')
                    <center><h1 class="" style="font-size: 40px; text-transform: uppercase;">SELAMAT DATANG FINANCE PAK {{ Auth::user()->name }} </h1></center>
                @endif
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif

        </div>
    
</x-app-layout>