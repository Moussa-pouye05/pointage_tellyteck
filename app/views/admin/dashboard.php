<div class="min-h-screen bg-slate-100 px-4 py-8">
    <div class="mx-auto max-w-5xl">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Dashboard admin</h1>
                <p class="text-sm text-gray-500">Bonjour <?= htmlspecialchars($user['nom']) ?>, gestion du pointage Tellyteck.</p>
            </div>
            <div class="flex gap-3">
                <a class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-white" href="<?= BASE_URL ?>/profile">Profil</a>
                <a class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800" href="<?= BASE_URL ?>/logout?csrf_token=<?= urlencode($csrfToken) ?>">Déconnexion</a>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-xl bg-white p-6 shadow">
                <p class="text-sm text-gray-500">Rôle</p>
                <p class="mt-2 text-xl font-semibold text-gray-900">Admin</p>
            </div>
            <div class="rounded-xl bg-white p-6 shadow">
                <p class="text-sm text-gray-500">Département</p>
                <p class="mt-2 text-xl font-semibold text-gray-900"><?= htmlspecialchars($user['department'] ?? 'Non renseigné') ?></p>
            </div>
            <div class="rounded-xl bg-white p-6 shadow">
                <p class="text-sm text-gray-500">Statut</p>
                <p class="mt-2 text-xl font-semibold text-green-700">Actif</p>
            </div>
        </div>
    </div>
</div>
