<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-5xl p-6">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Dashboard étudiant</h1>
                <p class="text-sm text-gray-500">Bonjour <?= htmlspecialchars($user['nom']) ?>, espace de pointage.</p>
            </div>
            <div class="flex gap-3">
                <a class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-white" href="<?= BASE_URL ?>/profil">Profil</a>
                <a class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800" href="<?= BASE_URL ?>/logout?csrf_token=<?= urlencode($csrfToken) ?>">Déconnexion</a>
            </div>
        </div>

        <div class="rounded-xl bg-white p-6 shadow">
            <p class="text-sm text-gray-500">Statut du compte moisaa</p>
            <p class="mt-2 text-xl font-semibold text-green-700">Actif</p>
            <p class="mt-4 text-sm text-gray-600">Le module de pointage peut maintenant être branché sur cet espace.</p>
        </div>
    </div>
</main>
