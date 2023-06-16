<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Supprimer mon compte
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Une fois que votre compte est supprimé, toutes les données seront effacées définitivement.
        </p>
    </header>

    <button onclick="openModal('confirm-user-deletion')" class="bg-red-500 text-white font-medium py-2 px-4 rounded profile-delete-submit">
        Supprimer
    </button>

    <div id="confirm-user-deletion" class="modal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="delete" />

                <h2 class="text-lg font-medium text-gray-900">
                    Voulez-vous vraiment supprimer votre compte ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Une fois que votre compte est supprimé, toutes les données seront effacées définitivement.
                </p>

                <div class="mt-6 update-row-input">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Password" />
                    @if ($errors->has('userDeletion.password'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('userDeletion.password') }}</p>
                    @endif
                </div>

                <div class="mt-6 flex justify-end choice-btn-container">
                    <button onclick="closeModal('confirm-user-deletion')" class="modal-btn bg-gray-500 text-white font-medium py-2 px-4 rounded">
                        Annuler
                    </button>

                    <button type="submit" class="modal-btn bg-red-500 text-white font-medium py-2 px-4 rounded ml-3">
                        Supprimer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
