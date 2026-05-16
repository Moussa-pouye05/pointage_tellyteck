<div class="min-h-screen flex items-center justify-center bg-navy-dark/95 p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Créer un compte</h1>
            <p class="text-gray-500 text-sm mt-2">Renseignez vos informations</p>
        </div>

        <form action="<?= BASE_URL ?>/register" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="nom">Nom</label>
                <input
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    type="text"
                    id="nom"
                    name="nom"
                    required
                >
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    type="email"
                    id="email"
                    name="email"
                    required
                >
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="department">Département</label>
                <input
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    type="text"
                    id="department"
                    name="department"
                >
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="telephone">Téléphone</label>
                <input
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    type="tel"
                    id="telephone"
                    name="telephone"
                >
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="role">Rôle</label>
                <select
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    id="role"
                    name="role"
                >
                    <option value="etudiant">Étudiant</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="password">Mot de passe</label>
                <input
                    class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500 outline-none"
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <button class="w-full bg-gradient-to-r from-navy-700 to-navy-800 text-white py-3 px-4 rounded-lg font-medium hover:from-navy-800 hover:to-navy-900 focus:outline-none focus:ring-2 focus:ring-navy-500 focus:ring-offset-2 shadow-lg" type="submit">
                S'inscrire
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Déjà un compte ?
            <a class="text-navy-600 hover:text-navy-700 font-medium" href="<?= BASE_URL ?>">Se connecter</a>
        </p>
    </div>
</div>
