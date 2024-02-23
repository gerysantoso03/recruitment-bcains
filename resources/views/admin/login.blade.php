@extends('layout.admin-master')
@section('content')
    <main class="flex h-screen">
        {{-- Login Form --}}
        <div class="flex-1 flex flex-col py-4 px-12 gap-2">
            {{-- Sign In Introduction --}}
            <div class="flex items-center justify-center py-16 relative">
                <a href="" class="flex items-center justify-start px-4 cursor-pointer">
                    <img class="w-96" src="{{ asset('images/BCA-insurance.png') }}" alt="BCAinsurance">
                </a>
                <div class="border-l-2 border-sky-100 py-4 px-12">
                    <p class="text-[2rem] font-semibold text-sky-800">Sign In</p>
                </div>
                <p class="absolute bottom-[2rem] text-align-center text-lg text-red-500">{!! session()->get('error') !!}</p>
            </div>

            {{-- Sign In Form Wrapper --}}
            <div class="rounded flex flex-col gap-4">
                {{-- Form Header --}}
                <div class="p-4">
                    <h3 class="text-sky-900 font-bold text-[3rem]">Welcome Back! <span class="text-sky-700 text-[3rem]"><i class="fa-solid fa-hands"></i></span></h3>
                    <p class="text-[1.4rem] text-sky-800 font-semibold">Sign in to dive into dashboard and get the stats.</p>
                </div>
                {{-- Sign In Form --}}
                <form action="{{ route('login.user') }}" method="post" class="p-4 flex flex-col gap-4">
                    @csrf
                    <div class="flex flex-col gap-4 w-full">
                        <label class="text-sky-800 font-semibold text-xl" for="username">Username</label>
                        <input type="text" name="username" placeholder="Exp: bobbydut, adminbcai, hcbcains" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black">
                        @if ($errors->has('username'))
                            <span class="text-red-500 text-sm">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col gap-4 w-full mb-8">
                        <label class="text-sky-800 font-semibold text-xl" for="password">Password</label>
                        <input placeholder="Password" name="password" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black" type="password">
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="bg-sky-800 text-white px-20 py-4 rounded-full text-[1.4rem]">Sign In</button>
                    </div>
                    <p class="text-center text-sky-900 text-[1.2rem]">Don't have an Account yet? <a class="text-sky-500" href="{{ route('register') }}">Create One!</a></p>
                </form>
            </div>
        </div>
        {{-- Login Page Ilustration --}}
        <div class="flex-1">
            <img src="{{ asset('images/recruitment.png') }}" class="object-cover h-full w-full" alt="Sign In Recruitment Photo">
        </div>
    </main>
@endsection