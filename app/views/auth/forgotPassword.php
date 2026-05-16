<div class="min-h-screen flex items-center justify-center bg-slate-900 p-4">
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Mot de passe oublié</h1>
            <p class="mt-2 text-sm text-gray-500">Recevez un lien temporaire par email.</p>
        </div>

        <form action="<?= BASE_URL ?>/forgot-password" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600"
                    type="email"
                    id="email"
                    name="email"
                    required
                >
            </div>

            <button class="w-full rounded-lg bg-slate-800 px-4 py-3 font-medium text-white hover:bg-slate-900" type="submit">
                Envoyer le lien
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            <a class="font-medium text-slate-600 hover:text-slate-700" href="<?= BASE_URL ?>">Retour connexion</a>
        </p>
    </div>
</div>
