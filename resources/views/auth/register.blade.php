<x-guest-layout>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2
                    class="text-center text-4xl text-blue-900 font-display font-semibold lg:text-left xl:text-5xl xl:text-bold">
                    Register Account</h2>
                <div class="mt-12">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" placeholder="ex. Alvin Martin"
                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="PhoneNumber" value="{{ __('PhoneNumber') }}" />
                            <x-jet-input id="PhoneNumber" class="block mt-1 w-full" type="tel"
                                placeholder="ex. 081233445566" name="PhoneNumber" :value="old('PhoneNumber')" required
                                autofocus autocomplete="PhoneNumber" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="Address" value="{{ __('Address') }}" />
                            <x-jet-input id="Address" class="block mt-1 w-full" type="text"
                                placeholder="ex. Jl. Boulevard, Gading Serpong" name="Address" :value="old('Address')"
                                required autofocus autocomplete="Address" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="City" value="{{ __('City') }}" />
                            <x-jet-input id="City" class="block mt-1 w-full" type="text" placeholder="ex. Tangerang"
                                name="City" :value="old('City')" required autofocus autocomplete="City" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="Username" value="{{ __('Username') }}" />
                            <x-jet-input id="Username" class="block mt-1 w-full" type="text" placeholder="ex. alvin123"
                                name="Username" :value="old('Username')" required autofocus autocomplete="Username" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email"
                                placeholder="ex. alvin.martin@lecturer.umn.ac.id" name="email" :value="old('email')"
                                required />
                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between items-center">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                            </div>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                placeholder="ex. Pwqe@1Lk1;23%" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="password_confirmation"
                                value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                placeholder="Re-enter your password" name="password_confirmation" required
                                autocomplete="new-password" />
                        </div>

                        @if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms
                                                of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                                Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                            font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
                            shadow-lg">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="mb-12 text-sm font-display font-semibold text-gray-700 text-center">
                        Already registered ? <a href="{{ route('login') }}" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Login now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-yellow-200 flex-1 h-25">
            <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                <a href="/">
                    <img class="w-full mx-auto" style="width: 400px;"
                    src="{{ asset('image/house.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
