<x-guest-layout>

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">
            Verify Your Email
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            We have sent a 6-digit verification code to your email address.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600 text-center">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 text-sm font-medium text-red-600 text-center">
            {{ $errors->first('code') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.verify') }}">
        @csrf

        <div>
            <x-input-label for="code" :value="__('Verification Code')" />

            <x-text-input
                id="code"
                class="block mt-1 w-full text-center text-2xl tracking-[0.5em]"
                type="text"
                name="code"
                maxlength="6"
                inputmode="numeric"
                autocomplete="one-time-code"
                required
                autofocus
                placeholder="000000"
            />

            <p class="mt-2 text-xs text-gray-500 text-center">
                Enter the 6-digit code sent to your email.
            </p>
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                {{ __('Verify Email') }}
            </x-primary-button>
        </div>
    </form>


    <div class="mt-4 text-center">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            class="text-sm text-gray-600 hover:text-green-700 underline"
        >
            Back to Registration
        </button>
    </form>
</div>

</x-guest-layout>