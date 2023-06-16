<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Mise à jour du mot de passe
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Soyez sûr d'utiliser un mot de passe long et compliqué pour qu'il reste sûr
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 profile-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="put" />

        <div class="update-row-input">
            <label for="current_password" class="block">Current Password</label>
            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            @if ($errors->has('updatePassword.current_password'))
                <p class="mt-2 text-sm text-red-600">{{ $errors->first('updatePassword.current_password') }}</p>
            @endif
        </div>

        <div class="update-row-input">
            <label for="password" class="block">New Password</label>
            <input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            @if ($errors->has('updatePassword.password'))
                <p class="mt-2 text-sm text-red-600">{{ $errors->first('updatePassword.password') }}</p>
            @endif
        </div>

        <div class="update-row-input">
            <label for="password_confirmation" class="block">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            @if ($errors->has('updatePassword.password_confirmation'))
                <p class="mt-2 text-sm text-red-600">{{ $errors->first('updatePassword.password_confirmation') }}</p>
            @endif
        </div>

        <div class="flex items-center gap-4 update-btn-container">
            <button type="submit" class="profile-info-submit bg-blue-500 text-white font-medium py-2 px-4 rounded">Mettre à jour</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Saved.</p>
            @endif
        </div>
    </form>
</section>
