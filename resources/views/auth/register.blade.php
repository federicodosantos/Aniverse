<x-layoutcred>
<div class="mx-auto max-w-7xl pb-16 py-6 sm:px-6 lg:px-20 h-full">
    <div class="py-5 bg-center">
    <h1 class="text-3xl font-bold tracking-tight text-white text-center pb-2">Sign Up</h1>
    <div class="flex py-3 justify-center items-center">
          <div class="h-[400px] bg-white bg-opacity-20 rounded-2xl w-[450px]">
                <div class="px-4 py-6 sm:px-6 lg:px-10">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div>
                            <x-input-label class="text-white" for="name" :value="__('Name')" />
                            <x-text-input id="name" class="h-8 bg-white bg-opacity-40 rounded-md w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="pt-6">
                            <x-input-label class="text-white" for="email" :value="__('Email')" />
                            <x-text-input id="email" class="h-8 bg-white bg-opacity-40 rounded-md w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="pt-6">
                            <x-input-label class="text-white" for="password" :value="__('Password')" />

                            <x-text-input id="password"  class="h-8 bg-white bg-opacity-40 rounded-md w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="pt-6">
                            <x-input-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="h-8 bg-white bg-opacity-40 rounded-md w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="pt-16 flex justify-center items-center">
                            <button class="mx-auto text-white bg-violet-500 rounded-3xl w-1/2 h-12">{{ __('Sign Up') }}</button>
                            <!-- <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button> -->
                        </div>
                    </form>
                    <a class="flex py-3 justify-center items-center text-center underline text-sm text-white hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already have an account? Sign In') }}
                    </a>
                </div>
          </div>
    </div>
</div>
</x-layoutcred>
