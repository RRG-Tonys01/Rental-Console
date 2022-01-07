<x-guest-layout>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-4xl text-blue-900 font-display font-semibold lg:text-left xl:text-5xl
                xl:text-bold">Log in</h2>
                <div class="mt-12">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Enter your email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                </div>
                                <div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800 cursor-pointer">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="Enter your password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="mt-8">
                              {!! NoCaptcha::display() !!}
                        </div>
                        @if(session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-10">
                            <button type="submit" class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                            font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
                            shadow-lg">
                                Log In
                            </button>
                        </div>
                    </form>
                    <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                        Don't have an account ? <a href="{{ route('register') }}" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-yellow-200 flex-1 h-screen">
            <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                <a href="/">
                    <img class="w-full mx-auto" style="width: 400px;"
                    src="{{ asset('image/house.svg') }}" alt="">
                </a>
            </div>
        </div>
        	{!! NoCaptcha::renderJs() !!}
    </div>
</x-guest-layout>
