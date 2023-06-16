<section class="profile-info-section">
    <header>
        <h2 class="text-lg profile-info-title font-medium text-gray-900">
            Informations du profil
        </h2>

        <p class="mt-1 text-sm profile-info-desc text-gray-600">
            Mettez à jour les informations de votre compte
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 profile-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="patch" />

        <div class="update-row-input">
            <label for="name" class="block">Name</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @if ($errors->has('name'))
                <p class="mt-2 text-sm text-red-600">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="update-row-input">
            <label for="email" class="block">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if ($errors->has('email'))
                <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified.
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Click here to re-send the verification email.
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex update-btn-container items-center gap-4">
            <button type="submit" class="bg-blue-500 profile-info-submit text-white font-medium py-2 px-4 rounded">Mettre à jour</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
