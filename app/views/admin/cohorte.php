<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>

<?php
$cohortes = $cohortes ?? [];
$departements = $departements ?? [];
$csrfToken = $_SESSION['csrf_token'] ?? '';
?>

<main class="min-h-screen ml-6 md:ml-[260px] mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="p-3 md:p-4">
        <!-- SECTION 1 : En-tête -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Départements & Cohortes</h1>
                <p class="text-gray-500 mt-1">Organisez les étudiants par département et cohorte</p>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="openDepartmentModal()" class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-medium text-sm hover:bg-gray-50 transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    Nouveau Département
                </button>
                <button onclick="openCohorteModal()" class="px-4 py-2.5 bg-blue-600 text-white rounded-xl font-medium text-sm hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    Nouvelle Cohorte
                </button>
            </div>
        </div>

        <!-- SECTION 2 : Cartes statistiques -->
        <?php
            $totalDepartements = count($departements);
            $totalCohortes = count($cohortes);
            $activeCohortes = count(array_filter($cohortes, fn($cohorte) => (int)$cohorte['is_active'] === 1));
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Départements actifs</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1"><?= $totalDepartements ?></p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total cohortes</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1"><?= $totalCohortes ?></p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Cohortes actives</p>
                        <p class="text-2xl font-bold text-green-600 mt-1"><?= $activeCohortes ?></p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 : Filtres -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Recherche</label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        <input type="text" placeholder="Rechercher un département ou une cohorte..." 
                            class="w-full pl-9 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm"
                            id="searchInput">
                    </div>
                </div>
                <div class="md:w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Statut</label>
                    <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm" id="statusFilter">
                        <option value="">Tous</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
                <div class="md:flex md:items-end">
                    <button onclick="resetFilters()" class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-medium text-sm hover:bg-gray-200 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        Réinitialiser
                    </button>
                </div>
            </div>
        </div>

        <!-- SECTION 4 : LISTE DES COHORTES EN CARDS -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Toutes les cohortes</h2>
                <span id="cohorteCount" class="text-sm text-gray-500"><?= count($cohortes) ?> cohortes</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="cohortesCardsContainer">
                <?php $daysNames = [1 => 'Lundi', 2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche']; ?>
                <?php if (!empty($cohortes)): ?>
                    <?php foreach ($cohortes as $cohorte): ?>
                        <?php
                            $jours = array_filter(array_map('trim', explode(',', $cohorte['work_days'])));
                            $joursLibelles = array_map(fn($jour) => $daysNames[(int)$jour] ?? $jour, $jours);
                        ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden cohort-card" data-name="<?= htmlspecialchars($cohorte['name']) ?>" data-department-name="<?= htmlspecialchars($cohorte['department_name'] ?? 'Département supprimé') ?>" data-status="<?= ((int)$cohorte['is_active'] === 1) ? 'active' : 'inactive' ?>">
                            <div class="p-5">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900"><?= htmlspecialchars($cohorte['name']) ?></h3>
                                            <p class="text-xs text-gray-500"><?= htmlspecialchars($cohorte['department_name'] ?? 'Département supprimé') ?></p>
                                        </div>
                                    </div>
                                    <span class="inline-flex px-2.5 py-1 rounded-lg <?= ((int)$cohorte['is_active'] === 1) ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?> font-medium text-xs">
                                        <?= ((int)$cohorte['is_active'] === 1) ? 'Actif' : 'Inactif' ?>
                                    </span>
                                </div>
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-500">Jours de cours:</span>
                                        <span class="font-medium text-gray-700"><?= htmlspecialchars(implode(', ', $joursLibelles)) ?></span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-500">Horaires:</span>
                                        <span class="font-medium text-gray-700"><?= htmlspecialchars($cohorte['start_time'] . ' - ' . $cohorte['end_time']) ?></span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-500">Créée le:</span>
                                        <span class="font-medium text-gray-700"><?= htmlspecialchars(date('d/m/Y', strtotime($cohorte['created_at']))) ?></span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                                    <button type="button" data-id="<?= $cohorte['id'] ?>" data-name="<?= htmlspecialchars($cohorte['name']) ?>" data-department-id="<?= $cohorte['department_id'] ?>" data-department-name="<?= htmlspecialchars($cohorte['department_name'] ?? '') ?>" data-work-days="<?= htmlspecialchars($cohorte['work_days']) ?>" data-start-time="<?= htmlspecialchars($cohorte['start_time']) ?>" data-end-time="<?= htmlspecialchars($cohorte['end_time']) ?>" data-is-active="<?= $cohorte['is_active'] ?>" data-created-at="<?= htmlspecialchars(date('d/m/Y', strtotime($cohorte['created_at']))) ?>" onclick="openCohorteDetailModal(this)" class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        Voir
                                    </button>
                                    <button type="button" data-id="<?= $cohorte['id'] ?>" data-name="<?= htmlspecialchars($cohorte['name']) ?>" data-department-id="<?= $cohorte['department_id'] ?>" data-work-days="<?= htmlspecialchars($cohorte['work_days']) ?>" data-start-time="<?= htmlspecialchars($cohorte['start_time']) ?>" data-end-time="<?= htmlspecialchars($cohorte['end_time']) ?>" data-is-active="<?= $cohorte['is_active'] ?>" onclick="editCohorte(this)" class="flex-1 px-3 py-2 text-orange-600 bg-orange-50 rounded-lg text-sm font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        Modifier
                                    </button>
                                    <?php if ((int)$cohorte['is_active'] === 1): ?>
                                        <button type="button" onclick="toggleCohorte(<?= $cohorte['id'] ?>, 0)" class="flex-1 px-3 py-2 text-red-600 bg-red-50 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            Désactiver
                                        </button>
                                    <?php else: ?>
                                        <button type="button" onclick="toggleCohorte(<?= $cohorte['id'] ?>, 1)" class="flex-1 px-3 py-2 text-green-600 bg-green-50 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                            Activer
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-gray-500">
                        Aucune cohorte disponible.
                    </div>
                <?php endif; ?>
                <div id="cohorteEmptyMessage" class="col-span-3 bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-gray-500 hidden">
                    Aucune cohorte ne correspond à votre recherche.
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-8">
            <div class="text-sm text-gray-600">
                Affichage de <span id="cohorteRangeStart" class="font-medium">0</span> à <span id="cohorteRangeEnd" class="font-medium">0</span> sur <span id="cohorteTotalCount" class="font-medium"><?= count($cohortes) ?></span> cohortes
            </div>
            <div id="cohortePagination" class="flex items-center gap-2"></div>
        </div>

        <!-- MODAL NOUVEAU DÉPARTEMENT -->
        <div id="departmentModal" class="fixed inset-0 z-50 hidden">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeDepartmentModal()"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4">
                    <div class="bg-white rounded-xl shadow-xl max-w-xl w-full transform transition-all">
                        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Nouveau Département</h3>
                            <button onclick="closeDepartmentModal()" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        <form id="departmentForm" method="POST" action="<?= BASE_URL ?>/departement">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                            <div class="p-6 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom du département *</label>
                                    <input type="text" name="name" required placeholder="Ex: Développement Web" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                                    <textarea name="description" rows="3" placeholder="Description du département..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm resize-none"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Statut</label>
                                    <select name="is_active" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                                        <option value="1">Actif</option>
                                        <option value="0">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                                <button type="button" onclick="closeDepartmentModal()" class="px-4 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Annuler</button>
                                <button type="submit" class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium text-sm flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                                    Créer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL NOUVELLE COHORTE avec Jours de cours en checkboxes -->
        <div id="cohorteModal" class="fixed inset-0 z-50 hidden">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeCohorteModal()"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4">
                    <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full transform transition-all">
                        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                            <h3 class="modal-title text-lg font-semibold text-gray-900">Nouvelle Cohorte</h3>
                            <button onclick="closeCohorteModal()" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        <form id="cohorteForm" method="POST" action="<?= BASE_URL ?>/cohorte/save">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                            <input type="hidden" id="cohorteId" name="cohorte_id" value="">
                            <div class="p-6 space-y-4">
                                <!-- Département -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Département *</label>
                                    <select name="department_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm" id="cohorteDepartment">
                                        <option value="">Sélectionner un département...</option>
                                        <?php if (!empty($departements)): ?>
                                            <?php foreach ($departements as $departement): ?>
                                                <option value="<?= htmlspecialchars($departement['id']) ?>"><?= htmlspecialchars($departement['name']) ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Aucun département disponible</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <!-- Nom cohorte -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom cohorte *</label>
                                    <input type="text" name="name" required placeholder="Ex: Cohorte 2025A" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm">
                                </div>

                                <!-- Jours de cours (Checkboxes) - stockés en base comme 1,2,3,4,5,6,7 -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Jours de cours *</label>
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="1" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Lundi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="2" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Mardi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="3" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Mercredi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="4" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Jeudi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="5" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Vendredi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="6" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Samedi</span>
                                        </label>
                                        <label class="flex items-center gap-2 p-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="checkbox" name="work_days[]" value="7" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Dimanche</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Horaires -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Heure d'entrée *</label>
                                        <input type="time" name="start_time" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Heure de sortie *</label>
                                        <input type="time" name="end_time" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                                    </div>
                                </div>

                                <!-- Statut -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Statut</label>
                                    <select name="is_active" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                                        <option value="1">Actif</option>
                                        <option value="0">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                                <button type="button" onclick="closeCohorteModal()" class="px-4 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Annuler</button>
                                <button type="submit" class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium text-sm flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                                    <span id="cohorteSubmitLabel">Créer</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DÉTAILS COHORTE -->
        <div id="cohorteDetailModal" class="fixed inset-0 z-50 hidden">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeCohorteDetailModal()"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4">
                    <div class="bg-white rounded-xl shadow-xl max-w-lg w-full transform transition-all">
                        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Détails de la cohorte</h3>
                            <button onclick="closeCohorteDetailModal()" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <p class="text-sm text-gray-500">Nom de la cohorte</p>
                                <p id="cohorteDetailName" class="mt-1 text-gray-900 font-semibold"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Département</p>
                                <p id="cohorteDetailDepartment" class="mt-1 text-gray-900"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Jours de cours</p>
                                <p id="cohorteDetailWorkDays" class="mt-1 text-gray-900"></p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Horaires</p>
                                    <p id="cohorteDetailHours" class="mt-1 text-gray-900"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Statut</p>
                                    <p id="cohorteDetailStatus" class="mt-1 text-gray-900"></p>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Créée le</p>
                                <p id="cohorteDetailCreatedAt" class="mt-1 text-gray-900"></p>
                            </div>
                        </div>
                        <div class="p-6 border-t border-gray-200 flex justify-end">
                            <button type="button" onclick="closeCohorteDetailModal()" class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Toast -->
<div id="toast" class="fixed bottom-6 right-6 z-50 hidden">
    <div class="bg-gray-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
        <span id="toastMessage">Action effectuée avec succès</span>
    </div>
</div>