<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="mx-auto max-w-7xl p-4 md:p-5">
        
        <!-- SECTION 1 : En-tête de page -->
        <section class="mb-5">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-1 h-5 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                        <h1 class="text-lg md:text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Mes Congés
                        </h1>
                    </div>
                    <p class="text-gray-500 text-xs ml-3">Gérez vos demandes d'absence et de congé</p>
                </div>
                <button id="btn-new-request" class="flex items-center justify-center gap-1.5 bg-blue-400 from-blue-600 to-blue-700 text-white px-4 py-1.5 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all text-sm font-semibold shadow-sm hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    <span>Nouvelle demande</span>
                </button>
            </div>
        </section>

        <!-- SECTION 2 : Cartes statistiques -->
        <section class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
            <!-- Carte 1 : Demandes totales -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Demandes totales</p>
                        <p class="text-xl font-bold text-gray-800 mt-1" id="stat-total">12</p>
                    </div>
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-calendar" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#2563eb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 5a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                            <path d="M16 3v4"></path>
                            <path d="M8 3v4"></path>
                            <path d="M4 11h16"></path>
                            <path d="M11 15l1 1l3 -3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte 2 : En attente -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">En attente</p>
                        <p class="text-xl font-bold text-yellow-600 mt-1" id="stat-pending">3</p>
                    </div>
                    <div class="p-2 bg-yellow-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ca8a04" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 7v5l3 3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte 3 : Approuvées -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Approuvées</p>
                        <p class="text-xl font-bold text-green-600 mt-1" id="stat-approved">7</p>
                    </div>
                    <div class="p-2 bg-green-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte 4 : Refusées -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Refusées</p>
                        <p class="text-xl font-bold text-red-600 mt-1" id="stat-rejected">2</p>
                    </div>
                    <div class="p-2 bg-red-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#dc2626" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3 : Filtres -->
        <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 mb-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Recherche par motif</label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                        <input type="text" id="filter-motif" placeholder="Rechercher un motif..." class="w-full pl-8 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 focus:bg-white transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Statut</label>
                    <select id="filter-status" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 focus:bg-white transition-all">
                        <option value="">Tous les statuts</option>
                        <option value="approved">Approuvé</option>
                        <option value="pending">En attente</option>
                        <option value="rejected">Refusé</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Date</label>
                    <input type="date" id="filter-date" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 focus:bg-white transition-all">
                </div>
            </div>
        </section>

        <!-- Modals (nécessaires pour public/assets/js/conge_etudiant.js) -->

        <!-- Modal Nouvelle demande -->
        <div id="modal-new-request" class="fixed inset-0 z-50 hidden items-center justify-center opacity-0 bg-black/40 p-4">
            <div class="relative w-full max-w-2xl bg-white rounded-xl shadow-2xl transform transition-all duration-200 scale-95">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                    <h3 class="text-base font-bold text-gray-800">Nouvelle demande</h3>
                    <button id="close-modal-new" class="p-2 rounded-lg hover:bg-gray-50 text-gray-500" type="button" aria-label="Fermer">✕</button>
                </div>

                <form id="form-new-request" class="p-4 space-y-4" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-gray-600">Type de demande</label>
                            <select id="request-type" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                                <option value="">Choisir...</option>
                                <option value="conge_maladie">Congé maladie</option>
                                <option value="absence_exceptionnelle">Absence exceptionnelle</option>
                                <option value="rendez_vous">Rendez-vous médical</option>
                                <option value="motif_familial">Motif familial</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-gray-600">Pièce jointe (optionnel)</label>
                            <input id="request-file" type="file" class="w-full text-sm text-gray-600" />
                            <div id="file-name" class="text-xs text-gray-500 mt-1"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-gray-600">Date début</label>
                            <input id="request-start-date" type="date" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" />
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-medium text-gray-600">Date fin</label>
                            <input id="request-end-date" type="date" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-gray-600">Motif</label>
                        <textarea id="request-motif" rows="3" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" placeholder="Décrivez votre motif..."></textarea>
                    </div>

                    <div id="request-summary" class="text-xs text-blue-800 font-medium">Veuillez sélectionner les dates pour voir la durée.</div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button id="cancel-request" type="button" class="px-4 py-2 text-sm rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50">Annuler</button>
                        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Détails -->
        <div id="modal-details" class="fixed inset-0 z-50 hidden items-center justify-center opacity-0 bg-black/40 p-4">
            <div class="relative w-full max-w-2xl bg-white rounded-xl shadow-2xl transform transition-all duration-200 scale-95">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                    <h3 class="text-base font-bold text-gray-800">Détails de la demande</h3>
                    <button id="close-modal-details" class="p-2 rounded-lg hover:bg-gray-50 text-gray-500" type="button" aria-label="Fermer">✕</button>
                </div>

                <div class="p-4 space-y-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500">Type</p>
                            <p id="detail-type" class="text-sm font-semibold text-gray-800">-</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500">Statut</p>
                            <span id="detail-status" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">-</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500">Début</p>
                            <p id="detail-start-date" class="text-sm font-semibold text-gray-800">-</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-500">Fin</p>
                            <p id="detail-end-date" class="text-sm font-semibold text-gray-800">-</p>
                        </div>
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-xs text-gray-500">Motif</p>
                        <p id="detail-motif" class="text-sm font-semibold text-gray-800">-</p>
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-xs text-gray-500">Date de création</p>
                        <p id="detail-created" class="text-sm font-semibold text-gray-800">-</p>
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg flex items-center justify-between gap-3">
                        <div>
                            <p class="text-xs text-gray-500">Pièce</p>
                            <button id="detail-file" type="button" class="text-sm font-semibold text-blue-600 hover:text-blue-800 text-left">-</button>
                        </div>
                        <button id="close-modal-details-btn" type="button" class="px-4 py-2 text-sm rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 4 : Tableau des demandes -->
        <section class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-3 border-b border-gray-100 bg-gray-100 bg-linear-to-r from-gray-50 to-white">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-history text-blue-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 8l0 4l2 2"></path>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg>
                    Historique des demandes
                </h2>
            </div>
            
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full min-w-[800px]">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Type</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Début</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Fin</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Motif</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Statut</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Pièce</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="requests-table-body" class="divide-y divide-gray-50">
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">Congé maladie</td>
                            <td class="py-2 px-3 text-sm text-gray-600">01/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">03/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600 max-w-[150px] truncate">Fièvre</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Approuvé</span>
                            </td>
                            <td class="py-2 px-3">
                                <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-xs" onclick="downloadFile('certificat.pdf')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M9 9l3 3l-3 3"></path>
                                        <path d="M9 14h6"></path>
                                        <path d="M9 11h6"></path>
                                    </svg>
                                    <span class="text-xs">certificat.pdf</span>
                                </button>
                            </td>
                            <td class="py-2 px-3">
                                <div class="flex gap-1.5">
                                    <button class="btn-view-data p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('certificat.pdf')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">Absence exceptionnelle</td>
                            <td class="py-2 px-3 text-sm text-gray-600">10/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">12/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600 max-w-[150px] truncate">Mariage familial</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">En attente</span>
                            </td>
                            <td class="py-2 px-3">
                                <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-xs" onclick="downloadFile('invitation.pdf')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M9 9l3 3l-3 3"></path>
                                        <path d="M9 14h6"></path>
                                        <path d="M9 11h6"></path>
                                    </svg>
                                    <span class="text-xs">invitation.pdf</span>
                                </button>
                            </td>
                            <td class="py-2 px-3">
                                <div class="flex gap-1.5">
                                    <button class="btn-view-data p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('invitation.pdf')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">Rendez-vous médical</td>
                            <td class="py-2 px-3 text-sm text-gray-600">15/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">15/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600 max-w-[150px] truncate">Consultation médecin</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">En attente</span>
                            </td>
                            <td class="py-2 px-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 3l18 18"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11"></path>
                                </svg>
                            </td>
                            <td class="py-2 px-3">
                                <div class="flex gap-1.5">
                                    <button class="btn-view-data p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-gray-300 cursor-not-allowed" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">Motif familial</td>
                            <td class="py-2 px-3 text-sm text-gray-600">20/05/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">22/05/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600 max-w-[150px] truncate">Obsèques</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Refusé</span>
                            </td>
                            <td class="py-2 px-3">
                                <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1 text-xs" onclick="downloadFile('certificat_deces.pdf')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M9 9l3 3l-3 3"></path>
                                        <path d="M9 14h6"></path>
                                        <path d="M9 11h6"></path>
                                    </svg>
                                    <span class="text-xs">certificat_deces.pdf</span>
                                </button>
                            </td>
                            <td class="py-2 px-3">
                                <div class="flex gap-1.5">
                                    <button class="btn-view-data p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('certificat_deces.pdf')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">Autre</td>
                            <td class="py-2 px-3 text-sm text-gray-600">25/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">26/06/2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600 max-w-[150px] truncate">Rendez-vous administratif</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Approuvé</span>
                            </td>
                            <td class="py-2 px-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 3l18 18"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11"></path>
                                </svg>
                            </td>
                            <td class="py-2 px-3">
                                <div class="flex gap-1.5">
                                    <button class="btn-view-data p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-gray-300 cursor-not-allowed" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-gray-50 px-3 py-2 border-t border-gray-100 flex flex-col sm:flex-row gap-2 justify-between items-center">
                <div class="text-xs text-gray-500">
                    Affichage de <span class="font-semibold text-gray-700">1</span> à <span class="font-semibold text-gray-700">5</span> sur <span class="font-semibold text-gray-700">12</span> demandes
                </div>
                <div class="flex items-center gap-1">
                    <button class="px-2 py-1 border border-gray-200 rounded-md text-xs text-gray-600 hover:bg-gray-100 transition-all flex items-center gap-1 opacity-40 cursor-not-allowed">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="hidden sm:inline">Précédent</span>
                    </button>
                    <span class="px-2 py-1 text-xs font-semibold text-gray-700 bg-white rounded-md border border-gray-200">1 / 3</span>
                    <button class="px-2 py-1 border border-gray-200 rounded-md text-xs text-gray-600 hover:bg-gray-100 transition-all flex items-center gap-1">
                        <span class="hidden sm:inline">Suivant</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

    </div>
</main>

<style>
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
    .card-hover {
        transition: all 0.2s ease;
    }
</style>

