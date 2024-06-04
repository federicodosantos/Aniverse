<x-layoutcred>
<div class="mx-auto max-w-7xl pb-40 py-6 sm:px-6 lg:px-20 h-max">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-4 bg-center">
    <h1 class="text-3xl font-bold tracking-tight text-white text-center pb-2">Sign In</h1>
    <div class="flex py-3 justify-center items-center">
          <div class="h-[400px] bg-white bg-opacity-20 rounded-2xl w-[450px]">
                <div class="px-4 py-6 sm:px-6 lg:px-10">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="pt-12">
                            <x-input-label class="text-white" for="email" :value="__('Email')" />
                            <x-text-input id="email" class="h-8 bg-white bg-opacity-40 rounded-md w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="pt-12">
                            <x-input-label class="text-white" for="password" :value="__('Password')" />

                            <x-text-input id="password" class="h-8 bg-white bg-opacity-40 rounded-md w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="flex flex-row justify-between text-white pt-2">
                            <div class="">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="pt-28 flex justify-center items-center">
                            <button class="mx-auto text-white bg-violet-500 rounded-3xl w-1/2 h-12" type="submit">{{ __('Sign in') }}</button>
                            <!-- <x-primary-button class="text-center flex justify-center items-center text-white bg-violet-500 w-1/2 h-12">
                                {{ __('log in') }}
                            </x-primary-button> -->
                        </div>
                        <div class="flex flex-col text-center justify-center items-center py-2">
                            <p class="py-2 text-white">or sign in with</p>
                            <a href="{{ route('user.login.google') }}">
                                <div class="w-32 h-12 rounded-[15px] shadow border border-indigo-400 flex justify-center flex-row text-white text-center">
                                    <img class="pt-1 pr-1 h-10" src="img/google.svg" alt="">
                                    <div class="flex justify-center items-center text-center pb-1"><p>Google</p></div>
                                </div>
                            </a>
                            <a class="flex py-3 justify-center items-center text-center underline text-sm text-white hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                {{ __('Don`t have an account? Sign Up') }}
                            </a>
                        </div>
                    </form>
                </div>
          </div>
    </div>
</div>
</x-layoutcred>
