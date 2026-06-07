<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>

<main class="min-h-screen ml-6 md:ml-60 mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="mx-auto max-w-7xl p-3 md:p-4">

        <!-- SECTION 1 : En-tête -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-5">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-1 h-5 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                    <h1 class="text-lg md:text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Demandes d'Absence
                    </h1>
    </div>
                <p class="text-gray-500 text-xs ml-3">Gérez les demandes d'absence et les justificatifs des étudiants</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-700">
                    <i class="ti ti-alarm mr-1 text-sm"></i>
                    25 demandes
                </span>
            </div>
        </div>

        <!-- SECTION 2 : Cartes statistiques compactes -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-5">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Demandes totales</p>
                        <p class="text-xl font-bold text-gray-800 mt-1">250</p>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="ti ti-calendar-event text-base text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">En attente</p>
                        <p class="text-xl font-bold text-orange-500 mt-1">25</p>
                    </div>
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="ti ti-clock-hour-4 text-base text-orange-500"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Approuvées</p>
                        <p class="text-xl font-bold text-green-600 mt-1">185</p>
        </div>
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="ti ti-check text-base text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Refusées</p>
                        <p class="text-xl font-bold text-red-600 mt-1">40</p>
                    </div>
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="ti ti-x text-base text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 : Filtres compacts -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 mb-5">
            <div class="flex flex-col lg:flex-row gap-2 items-end">
                <div class="w-full lg:w-1/5">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Recherche</label>
                    <div class="relative">
                        <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" id="searchInput" placeholder="Rechercher..." class="w-full pl-9 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
            </div>
                </div>
                <div class="w-full lg:w-1/6">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Statut</label>
                    <select id="filterStatus" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                        <option value="all">Tous</option>
                        <option value="pending">En attente</option>
                        <option value="approved">Approuvé</option>
                        <option value="rejected">Refusé</option>
                    </select>
                </div>
                <div class="w-full lg:w-1/6">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Département</label>
                    <select id="filterDept" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                        <option value="">Tous</option>
                        <option value="dev">Développement Web</option>
                        <option value="gestion">Gestion</option>
                        <option value="sciences">Sciences</option>
                    </select>
                </div>
                <div class="w-full lg:w-1/6">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Période (Début)</label>
                    <input type="date" id="filterDateStart" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                </div>
                <div class="w-full lg:w-1/6">
                    <label class="block text-xs font-medium text-gray-600 mb-1">Période (Fin)</label>
                    <input type="date" id="filterDateEnd" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                </div>
                <div class="w-full lg:w-auto flex gap-2">
                    <button onclick="applyFilters()" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-medium hover:bg-blue-700 transition shadow-sm flex items-center gap-1.5">
                        <i class="ti ti-filter text-sm"></i>
                        Filtrer
                    </button>
                    <button onclick="resetFilters()" class="px-3 py-1.5 bg-gray-100 text-gray-700 border border-gray-200 rounded-lg text-xs font-medium hover:bg-gray-200 transition flex items-center gap-1.5">
                        <i class="ti ti-refresh text-sm"></i>
                        Réinitialiser
                    </button>
                </div>
            </div>
        </div>

        <!-- SECTION 4 : Tableau principal compact -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-5 overflow-hidden">
            <div class="p-3 border-b border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <i class="ti ti-list text-blue-500"></i>
                    Liste des demandes
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px]">
                    <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Étudiant</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Département</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Type</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Date Début</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Date Fin</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Durée</th>
                            <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Statut</th>
                            <th class="px-3 py-2 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                    <tbody class="divide-y divide-gray-100" id="requestsTableBody">
                        <!-- Exemple 1 : En attente -->
                        <tr class="hover:bg-gray-50 transition group">
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/150?u=1" alt="Moussa" class="w-7 h-7 rounded-full object-cover border border-gray-200">
                                <div>
                                        <p class="text-sm font-semibold text-gray-800">Moussa Pouye</p>
                                        <p class="text-xs text-gray-500">moussa.p@edu.sn</p>
                                </div>
                            </div>
                        </td>
                            <td class="px-3 py-2 text-xs text-gray-600">Développement Web</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">Maladie</td>
                            <td class="px-3 py-2 text-xs text-gray-600">12/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600">14/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">3 jours</td>
                            <td class="px-3 py-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">En attente</span>
                        </td>
                            <td class="px-3 py-2 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="openDetailModal(1)" class="p-1 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded transition" title="Voir">
                                        <i class="ti ti-eye text-sm"></i>
                                    </button>
                                    <button onclick="openApproveModal(1)" class="p-1 text-gray-500 hover:text-green-600 hover:bg-green-50 rounded transition" title="Approuver">
                                        <i class="ti ti-check text-sm"></i>
                                    </button>
                                    <button onclick="openRejectModal(1)" class="p-1 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded transition" title="Refuser">
                                        <i class="ti ti-x text-sm"></i>
                                    </button>
                            </div>
                        </td>
                    </tr>
                        <!-- Exemple 2 : Approuvé -->
                        <tr class="hover:bg-gray-50 transition group">
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/150?u=2" alt="Awa" class="w-7 h-7 rounded-full object-cover border border-gray-200">
                                <div>
                                        <p class="text-sm font-semibold text-gray-800">Awa Ndiaye</p>
                                        <p class="text-xs text-gray-500">awa.n@edu.sn</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-2 text-xs text-gray-600">Gestion</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">Événement Famille</td>
                            <td class="px-3 py-2 text-xs text-gray-600">05/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600">05/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">1 jour</td>
                            <td class="px-3 py-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Approuvé</span>
                            </td>
                            <td class="px-3 py-2 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="openDetailModal(2)" class="p-1 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded transition" title="Voir">
                                        <i class="ti ti-eye text-sm"></i>
                                    </button>
                                    <button class="p-1 text-gray-300 cursor-not-allowed" disabled><i class="ti ti-check text-sm"></i></button>
                                    <button class="p-1 text-gray-300 cursor-not-allowed" disabled><i class="ti ti-x text-sm"></i></button>
                            </div>
                        </td>
                        </tr>
                        <!-- Exemple 3 : Refusé -->
                        <tr class="hover:bg-gray-50 transition group">
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/150?u=3" alt="Jean" class="w-7 h-7 rounded-full object-cover border border-gray-200">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Jean Bakaa</p>
                                        <p class="text-xs text-gray-500">jean.b@edu.sn</p>
                                    </div>
                                </div>
                        </td>
                            <td class="px-3 py-2 text-xs text-gray-600">Sciences</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">Autre</td>
                            <td class="px-3 py-2 text-xs text-gray-600">20/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600">22/06/2026</td>
                            <td class="px-3 py-2 text-xs text-gray-600 font-medium">3 jours</td>
                            <td class="px-3 py-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Refusé</span>
                            </td>
                            <td class="px-3 py-2 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="openDetailModal(3)" class="p-1 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded transition" title="Voir">
                                        <i class="ti ti-eye text-sm"></i>
                                    </button>
                                    <button class="p-1 text-gray-300 cursor-not-allowed" disabled><i class="ti ti-check text-sm"></i></button>
                                    <button class="p-1 text-gray-300 cursor-not-allowed" disabled><i class="ti ti-x text-sm"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>

            <!-- SECTION 8 : Historique récent compact -->
            <div class="p-3 border-t border-gray-100 bg-gray-50">
                <h3 class="text-xs font-semibold text-gray-600 mb-2 flex items-center gap-1.5">
                    <i class="ti ti-history text-blue-500 text-sm"></i> Historique récent
                </h3>
                <div class="space-y-1.5">
                    <div class="flex items-center gap-2 text-xs">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                        <span class="text-gray-600"><strong class="text-gray-800">Moussa Pouye</strong> approuvé</span>
                        <span class="text-gray-400 text-xs ml-auto">Aujourd'hui 08:15</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs">
                        <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                        <span class="text-gray-600"><strong class="text-gray-800">Awa Ndiaye</strong> refusée</span>
                        <span class="text-gray-400 text-xs ml-auto">Hier 14:32</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                        <span class="text-gray-600"><strong class="text-gray-800">Fatou Sarr</strong> approuvée</span>
                        <span class="text-gray-400 text-xs ml-auto">Hier 10:00</span>
                    </div>
                </div>
             </div>
        </div>

        <!-- SECTION 9 : Pagination compacte -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mb-5">
            <p class="text-xs text-gray-500">
                Affichage de <span class="font-semibold text-gray-700">1</span> à <span class="font-semibold text-gray-700">3</span> sur <span class="font-semibold text-gray-700">250</span> demandes
            </p>
            <nav class="flex items-center gap-1">
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">
                    <i class="ti ti-chevron-left text-sm"></i>
                </button>
                <button class="px-2 py-1 bg-blue-600 text-white rounded-lg text-xs font-medium">1</button>
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">4</button>
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">5</button>
                <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">
                    <i class="ti ti-chevron-right text-sm"></i>
                </button>
            </nav>
        </div>

        <!-- ========================================== -->
        <!-- MODALS COMPACTES -->
        <!-- ========================================== -->

        <!-- SECTION 5 : Modal Détails Demande compact -->
        <div id="modalDetail" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalDetail').classList.add('hidden')"></div>
                <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-2xl sm:w-full rounded-xl">
                    <div class="bg-white p-5">
                        <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-3">
                            <h3 class="text-base font-bold text-gray-800">Détails de la demande</h3>
                            <div class="flex gap-2 items-center">
                                <span id="detailStatusBadge" class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">En attente</span>
                                <button onclick="document.getElementById('modalDetail').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                                    <i class="ti ti-x text-lg"></i>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-1 bg-gray-50 p-3 rounded-lg border border-gray-100">
                                <div class="text-center mb-3">
                                    <img id="detailPhoto" src="https://i.pravatar.cc/150?u=1" alt="Photo" class="w-16 h-16 rounded-full object-cover border-2 border-white mx-auto shadow-sm">
                                    <h4 id="detailName" class="text-sm font-bold text-gray-800 mt-2">Moussa Pouye</h4>
                                    <p id="detailEmail" class="text-xs text-gray-500">moussa.p@edu.sn</p>
                                </div>
                                <div class="space-y-1.5 text-xs">
                                    <div class="flex items-center gap-1.5 text-gray-600">
                                        <i class="ti ti-phone text-gray-400 text-xs"></i> <span id="detailPhone">+221 77 123 45 67</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-600">
                                        <i class="ti ti-building text-gray-400 text-xs"></i> <span id="detailDept">Développement Web</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-600">
                                        <i class="ti ti-calendar text-gray-400 text-xs"></i> <span id="detailDateReq">11/06/2026</span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-3">
                                <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                    <h5 class="text-xs font-semibold text-blue-800 mb-2 flex items-center gap-1">
                                        <i class="ti ti-info-circle text-xs"></i> Informations
                                    </h5>
                                    <div class="grid grid-cols-2 gap-3 text-xs">
                                        <div><p class="text-gray-500">Type</p><p id="detailType" class="font-medium text-gray-800">Maladie</p></div>
                                        <div><p class="text-gray-500">Durée</p><p id="detailDuration" class="font-medium text-gray-800">3 jours</p></div>
                                        <div><p class="text-gray-500">Date Début</p><p id="detailDateStart" class="font-medium text-gray-800">12/06/2026</p></div>
                                        <div><p class="text-gray-500">Date Fin</p><p id="detailDateEnd" class="font-medium text-gray-800">14/06/2026</p></div>
                                    </div>
                                </div>

                                <div>
                                    <h5 class="text-xs font-semibold text-gray-600 mb-1">Motif</h5>
                                    <p id="detailReason" class="text-xs text-gray-600 leading-relaxed bg-gray-50 p-2 rounded-lg border border-gray-100">
                                        Je suis malade et je ne peux pas assister aux cours.
                                    </p>
                                </div>

                                <div>
                                    <h5 class="text-xs font-semibold text-gray-600 mb-1">Justificatif</h5>
                                    <div id="detailJustifArea" class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg border border-gray-200">
                                        <i class="ti ti-file-text text-gray-400 text-base"></i>
                                        <div class="flex-1">
                                            <p id="detailJustifName" class="text-xs font-medium text-gray-800">certificat.pdf</p>
                                            <p class="text-xs text-gray-500">124 KB</p>
                                        </div>
                                        <div class="flex gap-1">
                                            <button class="px-2 py-0.5 bg-white border border-gray-200 rounded text-xs text-gray-600 hover:bg-gray-50 flex items-center gap-0.5">
                                                <i class="ti ti-eye text-xs"></i> Voir
                                            </button>
                                            <button class="px-2 py-0.5 bg-blue-600 text-white rounded text-xs hover:bg-blue-700 flex items-center gap-0.5">
                                                <i class="ti ti-download text-xs"></i> DL
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-yellow-50 p-2 rounded-lg border border-yellow-100 text-xs text-yellow-700">
                                    <p class="font-semibold text-xs mb-0.5">Historique</p>
                                    <p class="text-xs">Créé le 11/06/2026 09:30</p>
                                </div>
                            </div>
                        </div>

                        <div id="detailActions" class="mt-4 pt-3 border-t border-gray-100 flex justify-end gap-2">
                            <button onclick="document.getElementById('modalDetail').classList.add('hidden')" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs hover:bg-gray-50">Annuler</button>
                            <button onclick="openApproveModalFromDetail()" class="px-3 py-1.5 bg-green-600 text-white rounded-lg text-xs hover:bg-green-700 flex items-center gap-1">
                                <i class="ti ti-check text-xs"></i> Approuver
                            </button>
                            <button onclick="closeDetailAndOpenReject()" class="px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700 flex items-center gap-1">
                                <i class="ti ti-x text-xs"></i> Refuser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 6 : Modal Refus compact -->
        <div id="modalReject" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalReject').classList.add('hidden')"></div>
                <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-md sm:w-full rounded-xl">
                    <div class="p-5">
                        <h3 class="text-base font-bold text-gray-800 mb-3 flex items-center gap-1.5">
                            <i class="ti ti-x text-red-600 text-base"></i> Refuser la demande
                        </h3>
                        <p class="text-xs text-gray-600 mb-3">Veuillez indiquer le motif du refus pour informer l'étudiant.</p>
                        <textarea id="rejectReason" rows="3" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none resize-none" placeholder="Ex : Le motif n'est pas justifié..."></textarea>
                        <div class="mt-4 flex justify-end gap-2">
                            <button onclick="document.getElementById('modalReject').classList.add('hidden')" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs hover:bg-gray-50">Annuler</button>
                            <button onclick="confirmReject()" class="px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 7 : Modal Validation compact -->
        <div id="modalApprove" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalApprove').classList.add('hidden')"></div>
                <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-md sm:w-full rounded-xl">
                    <div class="p-5 text-center">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ti ti-check text-xl text-green-600"></i>
                        </div>
                        <h3 class="text-base font-bold text-gray-800 mb-1">Approuver cette demande ?</h3>
                        <p class="text-xs text-gray-600 mb-4">L'étudiant recevra une notification de validation.</p>
                        <div class="flex justify-end gap-2">
                            <button onclick="document.getElementById('modalApprove').classList.add('hidden')" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs hover:bg-gray-50">Annuler</button>
                            <button onclick="confirmApprove()" class="px-3 py-1.5 bg-green-600 text-white rounded-lg text-xs hover:bg-green-700 flex items-center gap-1">
                                <i class="ti ti-check text-xs"></i> Approuver
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
</main>

<style>
    .card-hover {
        transition: all 0.2s ease;
    }
    .custom-scrollbar::-webkit-scrollbar {
        height: 4px;
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
</style>

