<x-guest-layout>
        <x-slot name="logo">
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
        <div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center">
        <div class="relative sm:max-w-sm w-sm">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-green-500 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl items-center  px-6 py-4 bg-gray-200 shadow-md">
            <img class="w-16 md:w-16 lg:w-16  text-white " stroke="currentColor" src="{{ asset('img/ansible.svg') }}" alt="logo company" title="logo company"> Asset Management System</label>
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="mt-1 block w-full border-none bg-gray-400 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" type="email" name="email" :value="old('email')" required autofocus />
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @else
                <span class="help-block with-errors"></span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="mt-1 block w-full border-none bg-gray-400 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" type="password" name="password" required autocomplete="current-password" />
                 @error('password')
                    <span class="help-block">{{ $message }}</span>
                @else
                <span class="help-block with-errors"></span>
                @enderror
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="bg-blue-500 w-full py-2 rounded-xl items-center text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
         </div>
        </div>
    </div>
</div>
</x-guest-layout>
