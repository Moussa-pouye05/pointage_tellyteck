<div class="min-h-screen flex items-center justify-center bg-slate-900 p-4">
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Nouveau mot de passe</h1>
            <p class="mt-2 text-sm text-gray-500">Choisissez un mot de passe sécurisé.</p>
        </div>

        <form action="<?= BASE_URL ?>/reset-password" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="password">Mot de passe</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600"
                    type="password"
                    id="password"
                    name="password"
                    minlength="8"
                    required
                >
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Confirmation</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    minlength="8"
                    required
                >
            </div>

            <button class="w-full rounded-lg bg-slate-800 px-4 py-3 font-medium text-white hover:bg-slate-900" type="submit">
                Réinitialiser
            </button>
        </form>
    </div>
</div>
