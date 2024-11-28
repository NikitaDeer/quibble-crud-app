<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <!-- Logo -->
        <div class="mb-8">
            <x-application-logo class="w-20 h-20 text-gray-500" />
        </div>

        <!-- Auth Links -->
        <div class="space-y-4 w-full sm:w-[400px]">
            @if (Route::has('login'))
                <div class="space-y-4">
                    @auth
                        <x-primary-button class="w-full justify-center" onclick="window.location.href='{{ url('/dashboard') }}'">
                            {{ __('Панель управления') }}
                        </x-primary-button>
                    @else
                        <x-primary-button class="w-full justify-center" onclick="window.location.href='{{ route('login') }}'">
                            {{ __('Войти') }}
                        </x-primary-button>

                        @if (Route::has('register'))
                            <x-secondary-button class="w-full justify-center" onclick="window.location.href='{{ route('register') }}'">
                                {{ __('Регистрация') }}
                            </x-secondary-button>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</x-guest-layout>