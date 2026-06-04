<?php
$navUser = $user ?? ($_SESSION['user'] ?? []);
$role = $navUser['role'] ?? '';
$nom = $navUser['nom'] ?? 'Utilisateur';
$initials = strtoupper(substr(trim($nom), 0, 2)) ?: 'UT';
$dashboardUrl = $role === 'admin' ? BASE_URL . '/admin/dashboard' : BASE_URL . '/etudiant/dashboard';
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$items = [
    [
        'label' => 'Tableau de bord',
        'href' => $dashboardUrl,
        'icon' => 'ti-layout-dashboard',
        'roles' => ['admin', 'etudiant'],
        'match' => ['/dashboard', '/admin/dashboard', '/etudiant/dashboard'],
    ],
    [
        'label' => 'Présences',
        'href' => BASE_URL . '/presences',
        'icon' => 'ti-user-check',
        'roles' => ['admin'],
        'match' => ['/presences', '/presence'],
    ],
    [
        'label' => 'Absences',
        'href' => BASE_URL . '/absences',
        'icon' => 'ti-user-off',
        'roles' => ['admin'],
        'match' => ['/absences', '/absence'],
    ],
    [
        'label' => 'Mes présences',
        'href' => BASE_URL . '/mes-presences',
        'icon' => 'ti-clipboard-check',
        'roles' => ['etudiant'],
        'match' => ['/mes-presences', '/mes_presence'],
    ],
    [
        'label' => 'Mes absences',
        'href' => BASE_URL . '/mes-absences',
        'icon' => 'ti-clipboard-x',
        'roles' => ['etudiant'],
        'match' => ['/mes-absences', '/mes_absence'],
    ],
    [
        'label' => 'Congé',
        'href' => BASE_URL . '/conge',
        'icon' => 'ti-calendar-time',
        'roles' => ['admin', 'etudiant'],
        'match' => ['/conge', '/conges'],
    ],
    [
        'label' => 'Utilisateurs',
        'href' => BASE_URL . '/utilisateurs',
        'icon' => 'ti-users',
        'roles' => ['admin'],
        'match' => ['/utilisateurs', '/utilisateur'],
    ],
    [
        'label' => 'Scanne QR',
        'href' => BASE_URL . '/qrcode',
        'icon' => 'ti-qrcode',
        'roles' => ['admin', 'etudiant'],
        'match' => ['/qrcode'],
    ],
    [
        'label' => 'Jours fériés',
        'href' => BASE_URL . '/feries',
        'icon' => 'ti-calendar-event',
        'roles' => ['admin'],
        'match' => ['/feries'],
    ],
    [
        'label' => 'Notifications',
        'href' => BASE_URL . '/notifications',
        'icon' => 'ti-bell',
        'roles' => ['admin', 'etudiant'],
        'match' => ['/notifications', '/notification'],
    ],
    [
        'label' => 'Profil',
        'href' => BASE_URL . '/profil',
        'icon' => 'ti-user-circle',
        'roles' => ['admin', 'etudiant'],
        'match' => ['/profil', '/profile'],
    ],
    [
        'label' => 'Audit logs',
        'href' => BASE_URL . '/audit-logs',
        'icon' => 'ti-history',
        'roles' => ['admin'],
        'match' => ['/audit-logs', '/audit_log'],
    ],
];

$isActive = static function (array $item) use ($currentPath): bool {
    foreach ($item['match'] as $match) {
        if (str_ends_with($currentPath, $match)) {
            return true;
        }
    }

    return false;
};
?>

<aside id="sideBare"
class="fixed -left-60 md:left-0  top-0 z-50 w-60 flex flex-col shrink-0 overflow-hidden bg-[#0a0f1e] min-h-screen transition-all duration-300">
    <div class="flex items-center gap-3 border-b border-blue-400/10 px-5 py-5">
        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-600">
            <i class="ti ti-fingerprint text-[19px] text-white" aria-hidden="true"></i>
        </div>
        <div>
            <p class="font-mono text-[11px] font-medium uppercase leading-none tracking-[.18em] text-blue-100">Tellyteck</p>
            <p class="mt-1 text-[10px] uppercase tracking-widest text-slate-500">Pointage</p>
        </div>
        <button id="close-sidebar" type="button" class="text-2xl text-slate-500 hover:text-slate-400 transition-duration-150 absolute top-3 right-3 block md:hidden" aria-label="Fermer le menu">X</button>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 py-4">
        <p class="px-3 pb-2 pt-1 text-[9px] font-medium uppercase tracking-[.16em] text-slate-500">Navigation</p>

        <?php foreach ($items as $item): ?>
            <?php if (!in_array($role, $item['roles'], true)) continue; ?>
            <?php $active = $isActive($item); ?>
            <a
                href="<?= htmlspecialchars($item['href']) ?>"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-[13px] no-underline transition <?= $active ? 'border border-blue-500/30 bg-blue-600/20 text-blue-50' : 'text-slate-400 hover:bg-white/5 hover:text-slate-100' ?>"
            >
                <i class="ti <?= htmlspecialchars($item['icon']) ?> text-[17px]" aria-hidden="true"></i>
                <span class="flex-1"><?= htmlspecialchars($item['label']) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="flex items-center gap-2.5 border-t border-blue-400/10 px-4 py-3.5">
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-blue-300/20 bg-blue-600/20 font-mono text-[10px] font-medium text-blue-200">
            <?= htmlspecialchars($initials) ?>
        </div>
        <div class="min-w-0 flex-1">
            <p class="truncate text-[12px] font-medium leading-none text-blue-100"><?= htmlspecialchars($nom) ?></p>
            <p class="mt-0.5 truncate text-[10px] capitalize text-slate-500"><?= htmlspecialchars($role) ?></p>
        </div>
        <a
            href="<?= BASE_URL ?>/logout?csrf_token=<?= urlencode($csrfToken ?? ($_SESSION['csrf_token'] ?? '')) ?>"
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-500/10 hover:text-red-400"
            aria-label="Se déconnecter"
            title="Se déconnecter"
        >
            <i class="ti ti-logout text-[16px]" aria-hidden="true"></i>
        </a>
    </div>
</aside>
