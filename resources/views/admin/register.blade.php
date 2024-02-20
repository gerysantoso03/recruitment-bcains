@extends('layout.admin-master')
@section('content')
    <main class="flex h-screen">
        {{-- Login Form --}}
        <div class="flex-1 flex flex-col py-4 px-12 gap-2">
            {{-- Sign In Introduction --}}
            <div class="flex items-center justify-center py-4">
                <a href="" class="flex items-center justify-start px-4 cursor-pointer">
                    <img class="w-96" src="{{ asset('images/BCA-insurance.png') }}" alt="BCAinsurance">
                </a>
                <div class="border-l-2 border-sky-100 py-4 px-12">
                    <p class="text-[2rem] font-semibold text-sky-800">Register</p>
                </div>
            </div>

            {{-- Sign In Form Wrapper --}}
            <div class="flex flex-1">
                {{-- Sign In Form --}}
                <form action="{{ route('register.user') }}" method="post" class="w-full p-4 flex flex-col gap-4">
                    @csrf
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-4 w-full">
                        <label class="text-sky-800 font-semibold text-2xl" for="username">Username</label>
                        <input type="text" placeholder="Exp: bobbydut, adminbcai, hcbcains" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black" name="username">
                        @if ($errors->has('username'))
                            <span class="text-red-500 text-sm">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-4 w-full">
                        <label class="text-sky-800 font-semibold text-2xl" for="email">Email</label>
                        <input placeholder="bobbydut@gmail.com" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black" type="email" name="email">
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-4 w-full">
                        <label class="text-sky-800 font-semibold text-2xl" for="phone_number">Phone Number</label>
                        <input placeholder="0849394039302" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black" type="text" name="phone_number">
                        @if ($errors->has('phone_number'))
                            <span class="text-red-500 text-sm">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-4 w-full mb-8">
                        <label class="text-sky-800 font-semibold text-2xl" for="password">Password</label>
                        <input placeholder="Password" class="text-[1.4rem] p-4 border border-sky-900 rounded-xl border-black" type="password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    {{-- Button Wrapper --}}
                    <div class="flex items-center justify-center">
                        <button name="submit" class="bg-sky-800 text-white px-20 py-4 rounded-full text-[1.4rem]">Register</button>
                    </div>
                    <p class="text-center text-sky-900 text-[1.2rem]">Already have an Account? <a class="text-sky-500" href="{{ route('login') }}">Sign In!</a></p>
                </form>
            </div>
        </div>
        {{-- Login Page Ilustration --}}
        <div class="flex-1">
            <img src="{{ asset('images/recruitment.png') }}" class="object-cover h-full w-full" alt="Sign In Recruitment Photo">
        </div>
    </main>
@endsection