<header id="navbar"
    class="h-20 sm:h-10 md:h-14 fixed-navbar flex items-center justify-between border-2 border-dark p-4 bg-slate-50">
    {{-- Navbar Logo --}}
    <section>
        <div class="w-80 sm:w-36 md:w-52">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="p-1 w-10/12">
        </div>
    </section>
    {{-- Navbar Content --}}
    <section>
        <div class=" text-lg sm:text-sm md:text-base lg:text-lg">
            <nav class="flex gap-x-20 sm:gap-x-10 md:gap-x-16 font-sans font-bold text-sky-900">
                <a href="{{ route('home') }}" class="active">Home</a>
                <a href="{{ route('home') }}#benefits">Benefits</a>
                <a href="{{ route('home') }}#process">Process</a>
                <a href="{{ route('home') }}#jobs">Jobs</a>
            </nav>
        </div>
    </section>
</header>

{{-- Navbar Style Animation --}}
<style>
    .fixed-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: top 0.3s ease-in-out, opacity 0.3s ease-in-out;
        opacity: 1;
    }

    .fixed-navbar a {
        text-decoration: none;
        position: relative;
        transition: color 0.3s ease-in-out;
    }

    .fixed-navbar a:hover {
        color: #0c4a6e;
    }

    .fixed-navbar a::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #0c4a6e;
        visibility: hidden;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out;
    }

    .fixed-navbar a:hover::before {
        visibility: visible;
        transform: scaleX(1);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.getElementById('navbar');
        var lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.style.top = '-80px';
            } else {
                navbar.style.top = '0';
            }

            lastScrollTop = scrollTop;
        });
    });
</script>
