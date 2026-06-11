<?php require_once __DIR__ . "/../partials/navbar.php" ?>
<?php require_once __DIR__ . "/../partials/header.php" ?>
<?php
$cohortes = $cohortes ?? [];
$departements = $departements ?? [];
$students = $students ?? ['items' => [], 'total' => 0, 'page' => 1, 'per_page' => 8, 'total_pages' => 1, 'from' => 0, 'to' => 0];
$stats = $stats ?? ['total' => 0, 'active' => 0, 'inactive' => 0, 'new_this_month' => 0];
$filters = $filters ?? ['search' => '', 'department_id' => 0, 'cohort_id' => 0, 'status' => 'all'];
$csrfToken = $csrfToken ?? ($_SESSION['csrf_token'] ?? '');

$buildUrl = function (array $overrides = []) use ($filters) {
    $params = array_merge($filters, $overrides);
    $params = array_filter($params, fn($value) => $value !== '' && $value !== 0 && $value !== 'all' && $value !== null);
    $query = http_build_query($params);

    return BASE_URL . '/utilisateurs' . ($query ? '?' . $query : '');
};
?>

<main class="min-h-screen ml-6 md:ml-[260px] mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="p-3 md:p-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-5">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
                    <h1 class="text-lg md:text-xl font-bold text-gray-800">Gestion des Etudiants</h1>
                </div>
                <p class="text-gray-500 text-xs ml-3">Gerez les comptes et leurs acces</p>
            </div>
            <div class="flex gap-2">
                <button onclick="document.getElementById('modalImportCSV').classList.remove('hidden')" class="px-3 py-1.5 bg-white text-gray-700 border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 transition shadow-sm flex items-center gap-1.5">
                    <i class="ti ti-upload text-base"></i>
                    <span>Importer CSV</span>
                </button>
                <button type="button" onclick="openAddStudentModal()" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition shadow-sm flex items-center gap-1.5">
                    <i class="ti ti-plus text-base"></i>
                    <span>Nouvel etudiant</span>
                </button>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-5">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Total etudiants</p>
                        <p class="text-xl font-bold text-gray-800 mt-1"><?= (int)$stats['total'] ?></p>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ti ti-users text-base text-blue-600"></i></div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Etudiants actifs</p>
                        <p class="text-xl font-bold text-green-600 mt-1"><?= (int)$stats['active'] ?></p>
                    </div>
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="ti ti-check text-base text-green-600"></i></div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Etudiants desactives</p>
                        <p class="text-xl font-bold text-red-600 mt-1"><?= (int)$stats['inactive'] ?></p>
                    </div>
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center"><i class="ti ti-lock text-base text-red-600"></i></div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Nouveaux ce mois</p>
                        <p class="text-xl font-bold text-blue-600 mt-1"><?= (int)$stats['new_this_month'] ?></p>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ti ti-calendar-plus text-base text-blue-600"></i></div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <form method="GET" action="<?= BASE_URL ?>/utilisateurs" class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 mb-5">
            <div class="flex flex-col lg:flex-row gap-2 items-end">
                <div class="w-full lg:w-1/3">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Recherche</label>
                    <div class="relative">
                        <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input name="search" value="<?= htmlspecialchars($filters['search']) ?>" type="text" placeholder="Nom, email, telephone..." class="w-full pl-9 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50">
                    </div>
                </div>
                <div class="w-full lg:w-1/5">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Departement</label>
                    <select name="department_id" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50">
                        <option value="0">Tous</option>
                        <?php foreach ($departements as $departement): ?>
                            <option value="<?= (int)$departement['id'] ?>" <?= (int)$filters['department_id'] === (int)$departement['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($departement['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-full lg:w-1/5">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Cohorte</label>
                    <select name="cohort_id" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50">
                        <option value="0">Toutes</option>
                        <?php foreach ($cohortes as $cohorte): ?>
                            <?php
                                $cohorteName = $cohorte['name'] ?? '';
                                $deptName = $cohorte['department_name'] ?? '';
                                $label = $deptName !== '' ? ($deptName . ' - ' . $cohorteName) : $cohorteName;
                            ?>
                            <option value="<?= (int)$cohorte['id'] ?>" <?= (int)$filters['cohort_id'] === (int)$cohorte['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-full lg:w-1/5">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Statut</label>
                    <select name="status" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50">
                        <option value="all" <?= $filters['status'] === 'all' ? 'selected' : '' ?>>Tous</option>
                        <option value="active" <?= $filters['status'] === 'active' ? 'selected' : '' ?>>Actif</option>
                        <option value="inactive" <?= $filters['status'] === 'inactive' ? 'selected' : '' ?>>Desactive</option>
                    </select>
                </div>
                <div class="flex w-full lg:w-auto gap-2">
                    <button type="submit" class="flex-1 px-3 py-1.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 flex items-center justify-center gap-1.5">
                        <i class="ti ti-filter text-sm"></i> Filtrer
                    </button>
                    <a href="<?= BASE_URL ?>/utilisateurs" class="flex-1 px-3 py-1.5 bg-gray-100 text-gray-700 border border-gray-200 rounded-lg text-sm font-medium hover:bg-gray-200 flex items-center justify-center gap-1.5">
                        <i class="ti ti-refresh text-sm"></i> Reinitialiser
                    </a>
                </div>
            </div>
        </form>

        <!-- Liste des étudiants -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-5 overflow-hidden">
            <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <i class="ti ti-users text-blue-500"></i> Liste des etudiants
                </h2>
                <span class="text-xs text-gray-500"><span class="text-blue-600 font-bold"><?= (int)$students['total'] ?></span> etudiants trouves</span>
            </div>

            <div class="p-4">
                <?php if (empty($students['items'])): ?>
                    <div class="py-12 text-center text-sm text-gray-500">Aucun etudiant ne correspond aux criteres.</div>
                <?php else: ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                        <?php foreach ($students['items'] as $student): ?>
                            <?php
                            $isActive = (int)$student['is_active'] === 1;
                            $avatar = $student['profil'] ? BASE_URL . '/public/' . ltrim($student['profil'], '/') : 'https://ui-avatars.com/api/?name=' . urlencode($student['nom']) . '&background=2563eb&color=fff';
                            ?>
                            <div class="bg-white rounded-lg border border-gray-200 hover:shadow-md transition overflow-hidden <?= $isActive ? '' : 'opacity-75' ?>">
                                <div class="p-4">
                                    <div class="flex items-center gap-3 mb-3">
                                        <img src="<?= htmlspecialchars($avatar) ?>" alt="Photo" class="w-12 h-12 rounded-full object-cover border-2 border-blue-100">
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-semibold text-sm text-gray-800 truncate"><?= htmlspecialchars($student['nom']) ?></h3>
                                            <p class="text-xs text-gray-500 truncate"><?= htmlspecialchars($student['email']) ?></p>
                                        </div>
                                    </div>

                                    <div class="space-y-2 mb-3">
                                        <div class="flex items-center justify-between gap-3 text-xs">
                                            <span class="text-gray-500">Telephone:</span>
                                            <span class="font-medium text-gray-700 truncate"><?= htmlspecialchars($student['telephone']) ?></span>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 text-xs">
                                            <span class="text-gray-500">Departement:</span>
                                            <span class="font-medium text-gray-700 truncate"><?= htmlspecialchars($student['department_name'] ?? 'Non defini') ?></span>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 text-xs">
                                            <span class="text-gray-500">Cohorte:</span>
                                            <span class="font-medium text-gray-700 truncate"><?= htmlspecialchars($student['cohort_name'] ?? 'Non definie') ?></span>
                                        </div>
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="text-gray-500">Statut:</span>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium <?= $isActive ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                                                <?= $isActive ? 'Actif' : 'Desactive' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                                        <button type="button" 
                                                data-student='<?= json_encode([
                                                    'id' => (int)$student['id'],
                                                    'nom' => htmlspecialchars($student['nom'], ENT_QUOTES, 'UTF-8'),
                                                    'email' => htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8'),
                                                    'telephone' => htmlspecialchars($student['telephone'] ?? '', ENT_QUOTES, 'UTF-8'),
                                                    'cohorte_id' => (int)($student['cohort_id'] ?? 0),
                                                ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                                onclick="openEditStudentModal(this)"
                                                class="flex-1 py-1.5 text-orange-600 bg-orange-50 rounded-lg text-xs font-medium hover:bg-orange-100 flex items-center justify-center gap-1">
                                            <i class="ti ti-edit text-sm"></i> Modifier
                                        </button>
                                        <form action="<?= BASE_URL ?>/utilisateurs/toggle" method="POST" class="flex-1" onsubmit="return confirm('Confirmer ce changement de statut ?')">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                                            <input type="hidden" name="id" value="<?= (int)$student['id'] ?>">
                                            <input type="hidden" name="is_active" value="<?= $isActive ? 0 : 1 ?>">
                                            <button type="submit" class="w-full py-1.5 <?= $isActive ? 'text-red-600 bg-red-50 hover:bg-red-100' : 'text-green-600 bg-green-50 hover:bg-green-100' ?> rounded-lg text-xs font-medium flex items-center justify-center gap-1">
                                                <i class="ti <?= $isActive ? 'ti-lock' : 'ti-check' ?> text-sm"></i>
                                                <?= $isActive ? 'Desactiver' : 'Activer' ?>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mb-5">
            <p class="text-xs text-gray-500">
                Affichage de <span class="font-semibold text-gray-700"><?= (int)$students['from'] ?></span>
                a <span class="font-semibold text-gray-700"><?= (int)$students['to'] ?></span>
                sur <span class="font-semibold text-gray-700"><?= (int)$students['total'] ?></span> etudiants
            </p>
            <nav class="flex items-center gap-1">
                <?php if ((int)$students['page'] > 1): ?>
                    <a class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50" href="<?= $buildUrl(['page' => (int)$students['page'] - 1]) ?>"><i class="ti ti-chevron-left"></i></a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= (int)$students['total_pages']; $i++): ?>
                    <a class="px-3 py-1 rounded-lg text-xs font-medium <?= $i === (int)$students['page'] ? 'bg-blue-600 text-white' : 'border border-gray-200 text-gray-600 hover:bg-gray-50' ?>" href="<?= $buildUrl(['page' => $i]) ?>"><?= $i ?></a>
                <?php endfor; ?>
                <?php if ((int)$students['page'] < (int)$students['total_pages']): ?>
                    <a class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50" href="<?= $buildUrl(['page' => (int)$students['page'] + 1]) ?>"><i class="ti ti-chevron-right"></i></a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</main>

<!-- Modal Ajouter Etudiant -->
<div id="modalAddStudent" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex min-h-screen items-center justify-center px-4 py-8">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeAddStudentModal()"></div>
        <div class="relative bg-white rounded-lg shadow-xl max-w-2xl w-full">
            <form id="studentCreateForm" action="<?= BASE_URL ?>/utilisateurs/create" method="POST">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Nouvel etudiant</h3>
                        <button type="button" onclick="closeAddStudentModal()" class="text-gray-400 hover:text-gray-500">
                            <i class="ti ti-x text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                            <input type="text" name="nom" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telephone *</label>
                            <input type="tel" name="telephone" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cohorte *</label>
                            <select name="cohorte_id" id="addStudentCohorte" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                <option value="">Selectionner une cohorte</option>
                                <?php foreach ($cohortes as $cohorte): ?>
                                    <option value="<?= (int)$cohorte['id'] ?>">
                                        <?= htmlspecialchars($cohorte['name'] ?? '') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end gap-3">
                    <button type="button" onclick="closeAddStudentModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">Annuler</button>
                    <button id="studentCreateSubmit" type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Creer etudiant</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Modifier Etudiant -->
<div id="modalEditStudent" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex min-h-screen items-center justify-center px-4 py-8">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeEditStudentModal()"></div>
        <div class="relative bg-white rounded-lg shadow-xl max-w-2xl w-full">
            <form id="studentEditForm" action="<?= BASE_URL ?>/utilisateurs/update" method="POST">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                <input type="hidden" name="id" id="editStudentId">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Modifier l'etudiant</h3>
                        <button type="button" onclick="closeEditStudentModal()" class="text-gray-400 hover:text-gray-500">
                            <i class="ti ti-x text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                            <input type="text" name="nom" id="editStudentNom" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" id="editStudentEmail" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telephone *</label>
                            <input type="tel" name="telephone" id="editStudentTelephone" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cohorte *</label>
                            <select name="cohorte_id" id="editStudentCohorte" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                <option value="">Selectionner une cohorte</option>
                                <?php foreach ($cohortes as $cohorte): ?>
                                    <option value="<?= (int)$cohorte['id'] ?>">
                                        <?= htmlspecialchars($cohorte['name'] ?? '') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end gap-3">
                    <button type="button" onclick="closeEditStudentModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

