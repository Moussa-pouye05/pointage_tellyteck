<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <!-- SECTION 1 : Header de page -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Absences & Justifications</h1>
                <p class="text-gray-500 mt-1">Suivi des absences, retards et justificatifs étudiants</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-100 text-blue-700 font-medium text-sm">
                    <i class="ri-user-off-line w-4 h-4 mr-1.5"></i>
                    125 absences enregistrées
                </span>
            </div>
        </div>

        <!-- SECTION 2 : Statistiques -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Total absences</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">125</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                        <i class="ri-user-off-line text-blue-600 text-xl"></i>
                    </div>
            </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition-shadow border-l-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Non justifiées</p>
                        <p class="text-2xl font-bold text-red-600 mt-1">32</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                        <i class="ri-alert-line text-red-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition-shadow border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">En attente</p>
                        <p class="text-2xl font-bold text-orange-600 mt-1">18</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                        <i class="ri-time-line text-orange-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition-shadow border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Validées</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">65</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                        <i class="ri-check-line text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition-shadow border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Retards</p>
                        <p class="text-2xl font-bold text-yellow-600 mt-1">47</p>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                        <i class="ri-alarm-line text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 : Filtres -->
        <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Étudiant</label>
                    <div class="relative">
                        <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input type="text" placeholder="Rechercher..." 
                            class="w-full pl-9 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Statut</label>
                    <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                        <option>Tous</option>
                        <option>Présent</option>
                        <option>Retard</option>
                        <option>Absent</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Justification</label>
                    <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                        <option>Toutes</option>
                        <option>Non justifiée</option>
                        <option>En attente</option>
                        <option>Validée</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Département</label>
                    <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                        <option>Sélectionner...</option>
                        <option>Développement Web</option>
                        <option>Data Science</option>
                        <option>IA</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap gap-3 mt-4">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium text-sm hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <i class="ri-filter-line"></i>
                    Filtrer
                </button>
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium text-sm hover:bg-gray-200 transition-colors flex items-center gap-2">
                    <i class="ri-refresh-line"></i>
                    Réinitialiser
                </button>
            </div>
        </div>

        <!-- SECTION 4 : Liste des absences en CARDS -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Liste des absences</h2>
                <span class="text-sm text-gray-500">20 résultats</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Carte 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=moussa" alt="Moussa Pouye" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-blue-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Moussa Pouye</h3>
                                    <p class="text-xs text-gray-500">moussa.pouye@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-red-100 text-red-700 font-medium text-xs">
                                Absent
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Développement Web</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">15/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">08:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-orange-100 text-orange-700 text-xs">
                                    En attente
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-green-600 bg-green-50 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-check-line"></i> Valider
                            </button>
                            <button class="flex-1 px-3 py-2 text-red-600 bg-red-50 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-close-line"></i> Refuser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Carte 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=awa" alt="Awa Ndiaye" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-green-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Awa Ndiaye</h3>
                                    <p class="text-xs text-gray-500">awa.ndiaye@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-green-100 text-green-700 font-medium text-xs">
                                Présent
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Data Science</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">14/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">08:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-green-100 text-green-700 text-xs">
                                    Validée
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-gray-400 bg-gray-50 rounded-lg text-sm font-medium cursor-not-allowed flex items-center justify-center gap-1" disabled>
                                <i class="ri-check-line"></i> Validée
                            </button>
                            <button class="flex-1 px-3 py-2 text-gray-400 bg-gray-50 rounded-lg text-sm font-medium cursor-not-allowed flex items-center justify-center gap-1" disabled>
                                <i class="ri-close-line"></i> Refuser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Carte 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=omar" alt="Omar Diallo" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-yellow-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Omar Diallo</h3>
                                    <p class="text-xs text-gray-500">omar.diallo@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-yellow-100 text-yellow-700 font-medium text-xs">
                                Retard
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Intelligence Artificielle</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">13/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">08:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-red-100 text-red-700 text-xs">
                                    Non justifiée
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-green-600 bg-green-50 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-check-line"></i> Justifier
                            </button>
                            <button class="flex-1 px-3 py-2 text-orange-600 bg-orange-50 rounded-lg text-sm font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-mail-send-line"></i> Relancer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Carte 4 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=cheikh" alt="Cheikh Ba" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-red-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Cheikh Ba</h3>
                                    <p class="text-xs text-gray-500">cheikh.ba@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-red-100 text-red-700 font-medium text-xs">
                                Absent
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Cybersécurité</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">12/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">10:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-red-100 text-red-700 text-xs">
                                    Refusée
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-gray-400 bg-gray-50 rounded-lg text-sm font-medium cursor-not-allowed flex items-center justify-center gap-1" disabled>
                                <i class="ri-check-line"></i> Refusée
                            </button>
                            <button class="flex-1 px-3 py-2 text-red-600 bg-red-50 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-delete-bin-line"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Carte 5 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=marie" alt="Marie Diop" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-orange-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Marie Diop</h3>
                                    <p class="text-xs text-gray-500">marie.diop@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-orange-100 text-orange-700 font-medium text-xs">
                                En attente
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Design UX/UI</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">11/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">14:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-orange-100 text-orange-700 text-xs">
                                    En attente
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-green-600 bg-green-50 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-check-line"></i> Valider
                            </button>
                            <button class="flex-1 px-3 py-2 text-red-600 bg-red-50 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-close-line"></i> Refuser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Carte 6 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?u=pierre" alt="Pierre Sarr" 
                                    class="w-12 h-12 rounded-full object-cover border-2 border-green-100">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Pierre Sarr</h3>
                                    <p class="text-xs text-gray-500">pierre.sarr@edu.sn</p>
                                </div>
                            </div>
                            <span class="inline-flex px-2.5 py-1 rounded-lg bg-green-100 text-green-700 font-medium text-xs">
                                Validée
                            </span>
                        </div>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Département:</span>
                                <span class="font-medium text-gray-700">Gestion de projet</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Date absence:</span>
                                <span class="font-medium text-gray-700">10/06/2026</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Heure prévue:</span>
                                <span class="font-medium text-gray-700">09:00</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Justification:</span>
                                <span class="inline-flex px-2 py-0.5 rounded-lg bg-green-100 text-green-700 text-xs">
                                    Validée
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                            <button class="flex-1 px-3 py-2 text-blue-600 bg-blue-50 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                                <i class="ri-eye-line"></i> Voir
                            </button>
                            <button class="flex-1 px-3 py-2 text-gray-400 bg-gray-50 rounded-lg text-sm font-medium cursor-not-allowed flex items-center justify-center gap-1" disabled>
                                <i class="ri-check-line"></i> Validée
                            </button>
                            <button class="flex-1 px-3 py-2 text-gray-400 bg-gray-50 rounded-lg text-sm font-medium cursor-not-allowed flex items-center justify-center gap-1" disabled>
                                <i class="ri-close-line"></i> Refuser
                            </button>
                        </div>
                    </div>
                 </div>
             </div>
            </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-8">
            <div class="text-sm text-gray-600">
                Affichage de <span class="font-medium">1</span> à <span class="font-medium">6</span> sur <span class="font-medium">24</span> absences
                </div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="ri-arrow-left-s-line"></i>
                </button>
                <button class="px-3 py-1.5 text-sm font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-lg">1</button>
                <button class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">2</button>
                <button class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">3</button>
                <button class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">4</button>
                <button class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            </div>
        </div>

        <!-- Panneau latéral justifications récentes (version cards) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Justifications récentes</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                        <img src="https://i.pravatar.cc/150?u=moussa" alt="Moussa" class="w-10 h-10 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">Moussa Pouye</p>
                            <p class="text-xs text-gray-500">Aujourd'hui 08:12</p>
                        </div>
                        <span class="inline-flex px-2 py-1 rounded-lg bg-orange-100 text-orange-700 font-medium text-xs">En attente</span>
                    </div>
                    <div class="h4">
                        <p>nom:jean cissé</p>
                        <button class="absent">Absent</button>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                        <img src="https://i.pravatar.cc/150?u=marie" alt="Marie" class="w-10 h-10 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">Marie Diop</p>
                            <p class="text-xs text-gray-500">14/06/2026 16:30</p>
                        </div>
                        <span class="inline-flex px-2 py-1 rounded-lg bg-orange-100 text-orange-700 font-medium text-xs">En attente</span>
                    </div>
                </div>
             </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Historique des actions</h3>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="ri-user-line text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Admin Principal</p>
                            <p class="text-sm text-gray-600">Justification validée</p>
                            <p class="text-xs text-gray-500 mt-0.5">15/06/2026 09:12</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center">
                            <i class="ri-user-line text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Admin Principal</p>
                            <p class="text-sm text-gray-600">Justification refusée</p>
                            <p class="text-xs text-gray-500 mt-0.5">15/06/2026 08:45</p>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</main>
