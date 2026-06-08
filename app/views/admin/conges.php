<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>

<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-5xl">
    <div class="main">
    <div class="title">
        <h2>Demandes de congé</h2>
        <p>Tableau de bord / Demandes de congé</p>
    </div>
    <div class="cards">
        <div class="card">
            <div class="card-top">
                <div class="icon blue"><i class="fa-solid fa-file"></i></div>
            </div>
            <div class="card-text">
                <p>Total demandes</p>
                <h3>128</h3>
                <p>Toutes les demandes</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon orange"><i class="fa-solid fa-clock"></i></div>
            </div>
            <div class="card-text">
                <p>En attente</p>
                <h3>128</h3>
                <p>En attente de validation</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon green"><i class="fa-solid fa-circle-check"></i></div>
            </div>
            <div class="card-text">
                <p>Approuvé</p>
                <h3>128</h3>
                <p>Demandes Approuvées</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon red"><i class="fa-solid fa-circle-xmark"></i></div>
            </div>
            <div class="card-text">
                <p>Refusé</p>
                <h3>128</h3>
                <p>Demandes réfuées</p>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="table-card">
            <div class="filters">
                <input type="search" placeholder="filter par nom...">
                <select>
                    <option>Tous les status</option>
                </select>
                <select>
                    <option>Tous les départements</option>
                </select>
                <input type="date">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Employé</th>
                        <th>Département</th>
                        <th>Type</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user">
                                <img src="https://i.pravatar.cc/100?img=1">
                                <div>
                                    <h4>Sarah Benali</h4>
                                    <small>RH</small>
                                </div>
                            </div>
                        </td>
                        <td>Marketing</td>
                        <td>Congé annuel</td>
                        <td>20/05/2026</td>
                        <td>25/05/2026</td>
                        <td>
                            <span class="status pending">En attente</span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user">
                                <img src="https://i.pravatar.cc/100?img=5">
                                <div>
                                    <h4>Mohamed Ali</h4>
                                    <small>IT</small>
                                </div>
                            </div>
                        </td>

                        <td>Développement</td>
                        <td>Maladie</td>
                        <td>12/05/2026</td>
                        <td>18/05/2026</td>
                        <td>
                            <span class="status approved">Approuvé</span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>


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
             <div class="pajination">
                <h5>Affichage de 1 à 6 sur 30 absences</h5>
                <div class="button">
                    <button><</button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>></button>
                </div>
             </div>
        </div>
        <div class="right">
            <div class="calendar">
                <h3>Calendrier des congés</h3>
                <div class="calendar-box">
                    <input type="date">
                </div>
            </div>
            <div class="absent">
                <h3>Employés absents aujourd'hui</h3>
                <div class="absent-user">
                    <img src="" alt="logo">
                    <div>
                        <h4>Sarah Benali</h4>
                        <p>Congé annuel</p>
                    </div>
                </div>
                <div class="absent-user">
                    <img src="" alt="logo">
                    <div>
                        <h4>Mohamed Ali</h4>
                        <p>Maladie</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>


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

