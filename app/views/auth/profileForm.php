<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-3xl rounded-2xl bg-white p-8 shadow">
        <div class="mb-8 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Mon profil</h1>
                <p class="text-sm text-gray-500"><?= htmlspecialchars($user['email']) ?> · <?= htmlspecialchars($user['role']) ?></p>
            </div>
            <a class="rounded-lg bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-900" href="<?= BASE_URL ?>/logout?csrf_token=<?= urlencode($csrfToken) ?>">Déconnexion</a>
        </div>

        <form action="<?= BASE_URL ?>/profil" method="POST" enctype="multipart/form-data" class="grid gap-5">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

            <?php if (!empty($user['profil'])): ?>
                <img class="h-24 w-24 rounded-full object-cover" src="<?= BASE_URL . '/' . htmlspecialchars($user['profil']) ?>" alt="Photo de profil">
            <?php endif; ?>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="profil">Photo de profil</label>
                <input class="block w-full rounded-lg border border-gray-300 px-3 py-3" type="file" id="profil" name="profil" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="nom">Nom</label>
                    <input class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600" type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="telephone">Téléphone</label>
                    <input class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600" type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="department">Département</label>
                <input class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600" type="text" id="department" name="department" value="<?= htmlspecialchars($user['department'] ?? '') ?>">
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="password">Nouveau mot de passe</label>
                    <input class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600" type="password" id="password" name="password" minlength="8">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Confirmation</label>
                    <input class="block w-full rounded-lg border border-gray-300 px-3 py-3 outline-none focus:border-slate-600 focus:ring-2 focus:ring-slate-600" type="password" id="password_confirmation" name="password_confirmation" minlength="8">
                </div>
            </div>

            <button class="rounded-lg bg-slate-800 px-4 py-3 font-medium text-white hover:bg-slate-900" type="submit">
                Enregistrer
            </button>
        </form>
    </div>
</main>
