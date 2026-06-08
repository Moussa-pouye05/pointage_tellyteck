<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<?php
$cohortes = $cohortes ?? [];
$csrfToken = $csrfToken ?? ($_SESSION['csrf_token'] ?? '');
?>

<main class="min-h-screen ml-6 md:ml-[260px] mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
<div class="p-3 md:p-4">

<!-- SECTION 1 : Header de page -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-5">
    <div>
        <div class="flex items-center gap-2 mb-1">
            <div class="w-1 h-5 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
            <h1 class="text-lg md:text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                Gestion des Étudiants
            </h1>
        </div>
        <p class="text-gray-500 text-xs ml-3">Gérez les comptes étudiants et leurs accès</p>
    </div>
    <div class="flex gap-2">
        <button onclick="document.getElementById('modalImportCSV').classList.remove('hidden')" class="px-3 py-1.5 bg-white text-gray-700 border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 transition shadow-sm flex items-center gap-1.5">
            <i class="ti ti-upload text-base"></i>
            <span class="hidden sm:inline">Importer CSV</span>
        </button>
        <button onclick="document.getElementById('modalAddStudent').classList.remove('hidden')" class="px-3 py-1.5 bg-blue-400 from-blue-600 to-blue-700 text-white rounded-lg text-sm font-medium hover:from-blue-700 hover:to-blue-800 transition shadow-sm flex items-center gap-1.5">
            <i class="ti ti-plus text-base"></i>
            <span class="hidden sm:inline">Nouvel étudiant</span>
        </button>
    </div>
</div>

<!-- SECTION 2 : Statistiques compactes -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-5">
    <!-- Carte 1 -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-medium">Total étudiants</p>
                <p class="text-xl font-bold text-gray-800 mt-1">254</p>
            </div>
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="ti ti-users text-base text-blue-600"></i>
            </div>
        </div>
    </div>
    <!-- Carte 2 -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-medium">Étudiants actifs</p>
                <p class="text-xl font-bold text-green-600 mt-1">238</p>
            </div>
            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="ti ti-check text-base text-green-600"></i>
            </div>
        </div>
    </div>
    <!-- Carte 3 -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-medium">Étudiants désactivés</p>
                <p class="text-xl font-bold text-red-600 mt-1">16</p>
            </div>
            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="ti ti-lock text-base text-red-600"></i>
            </div>
        </div>
    </div>
    <!-- Carte 4 -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 hover:shadow-md transition card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-medium">Nouveaux ce mois</p>
                <p class="text-xl font-bold text-blue-600 mt-1">42</p>
            </div>
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="ti ti-star text-base text-blue-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3 : Filtres compacts -->
<div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 mb-5">
    <div class="flex flex-col lg:flex-row gap-2 items-end">
        <div class="w-full lg:w-1/3">
            <label class="block text-xs font-medium text-gray-600 mb-1">Recherche</label>
            <div class="relative">
                <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Rechercher par nom, email..." class="w-full pl-9 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
            </div>
        </div>
        <div class="w-full lg:w-1/5">
            <label class="block text-xs font-medium text-gray-600 mb-1">Département</label>
            <select class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                <option value="">Tous</option>
                <option value="informatique">Informatique</option>
                <option value="gestion">Gestion</option>
                <option value="sciences">Sciences</option>
            </select>
        </div>
        <div class="w-full lg:w-1/5">
            <label class="block text-xs font-medium text-gray-600 mb-1">Cohorte</label>
            <select class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                <option value="">Tous</option>
                <option value="etudiant">Cohorte1</option>
                <option value="delegue">Cohorte2</option>
                
            </select>
        </div>
        <div class="w-full lg:w-1/5">
            <label class="block text-xs font-medium text-gray-600 mb-1">Statut</label>
            <select class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition" id="filterStatus">
                <option value="all">Tous</option>
                <option value="active">Actif</option>
                <option value="inactive">Désactivé</option>
            </select>
        </div>
        <div class="w-full lg:w-auto">
            <button class="w-full px-3 py-1.5 bg-gray-100 text-gray-700 border border-gray-200 rounded-lg text-sm font-medium hover:bg-gray-200 transition flex items-center justify-center gap-1.5">
                <i class="ti ti-refresh text-sm"></i>
                Réinitialiser
            </button>
        </div>
    </div>
</div>

<!-- SECTION 4 : Liste des étudiants en CARDS -->
<div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-5 overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
        <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Liste des étudiants
        </h2>
        <span class="text-xs text-gray-500">
            <span class="text-blue-600 font-bold">254</span> étudiants au total
        </span>
    </div>
    
    <!-- Grille de cartes responsive -->
    <div class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Carte étudiant 1 - Actif -->
            <div class="bg-white rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="https://i.pravatar.cc/150?u=1" alt="Photo" class="w-12 h-12 rounded-full object-cover border-2 border-blue-100 group-hover:border-blue-300 transition-colors">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-sm text-gray-800 truncate">Aminata Diop</h3>
                            <p class="text-xs text-gray-500 truncate">aminata.diop@edu.sn</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Téléphone:</span>
                            <span class="font-medium text-gray-700">+221 77 123 45 67</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Département:</span>
                            <span class="font-medium text-gray-700">Informatique</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Cohorte:</span>
                            <span class="font-medium text-gray-700">Cohorte 2025A</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Statut:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Actif</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                        <button onclick="openStudentDetailModal('Aminata Diop')" class="flex-1 py-1.5 text-blue-600 bg-blue-50 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Voir
                        </button>
                        <button onclick="openEditStudentModal('Aminata Diop')" class="flex-1 py-1.5 text-orange-600 bg-orange-50 rounded-lg text-xs font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Modifier
                        </button>
                        <button onclick="toggleStudentStatus('Aminata Diop', 'desactiver')" class="flex-1 py-1.5 text-red-600 bg-red-50 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                            Désactiver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Carte étudiant 2 - Désactivé -->
            <div class="bg-white rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden group opacity-75">
                <div class="p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="https://i.pravatar.cc/150?u=2" alt="Photo" class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 group-hover:border-gray-300 transition-colors">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-sm text-gray-800 truncate">Moussa Ndiaye</h3>
                            <p class="text-xs text-gray-500 truncate">moussa.ndiaye@edu.sn</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Téléphone:</span>
                            <span class="font-medium text-gray-700">+221 78 987 65 43</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Département:</span>
                            <span class="font-medium text-gray-700">Gestion</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Cohorte:</span>
                            <span class="font-medium text-gray-700">Cohorte 2025B</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Statut:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Désactivé</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                        <button onclick="openStudentDetailModal('Moussa Ndiaye')" class="flex-1 py-1.5 text-blue-600 bg-blue-50 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Voir
                        </button>
                        <button onclick="openEditStudentModal('Moussa Ndiaye')" class="flex-1 py-1.5 text-orange-600 bg-orange-50 rounded-lg text-xs font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Modifier
                        </button>
                        <button onclick="toggleStudentStatus('Moussa Ndiaye', 'activer')" class="flex-1 py-1.5 text-green-600 bg-green-50 rounded-lg text-xs font-medium hover:bg-green-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                            Activer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Carte étudiant 3 - Actif -->
            <div class="bg-white rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="https://i.pravatar.cc/150?u=3" alt="Photo" class="w-12 h-12 rounded-full object-cover border-2 border-blue-100 group-hover:border-blue-300 transition-colors">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-sm text-gray-800 truncate">Fatou Sow</h3>
                            <p class="text-xs text-gray-500 truncate">fatou.sow@edu.sn</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Téléphone:</span>
                            <span class="font-medium text-gray-700">+221 76 543 21 09</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Département:</span>
                            <span class="font-medium text-gray-700">Informatique</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Cohorte:</span>
                            <span class="font-medium text-gray-700">Cohorte 2025A</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Statut:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Actif</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                        <button onclick="openStudentDetailModal('Fatou Sow')" class="flex-1 py-1.5 text-blue-600 bg-blue-50 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Voir
                        </button>
                        <button onclick="openEditStudentModal('Fatou Sow')" class="flex-1 py-1.5 text-orange-600 bg-orange-50 rounded-lg text-xs font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Modifier
                        </button>
                        <button onclick="toggleStudentStatus('Fatou Sow', 'desactiver')" class="flex-1 py-1.5 text-red-600 bg-red-50 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                            Désactiver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Carte étudiant 4 - En congé -->
            <div class="bg-white rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="https://i.pravatar.cc/150?u=5" alt="Photo" class="w-12 h-12 rounded-full object-cover border-2 border-orange-100 group-hover:border-orange-300 transition-colors">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-sm text-gray-800 truncate">Mariama Ba</h3>
                            <p class="text-xs text-gray-500 truncate">mariama.ba@edu.sn</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Téléphone:</span>
                            <span class="font-medium text-gray-700">+221 77 111 22 33</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Département:</span>
                            <span class="font-medium text-gray-700">Marketing</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Cohorte:</span>
                            <span class="font-medium text-gray-700">Cohorte 2025B</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Statut:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-700">En congé</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                        <button onclick="openStudentDetailModal('Mariama Ba')" class="flex-1 py-1.5 text-blue-600 bg-blue-50 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Voir
                        </button>
                        <button onclick="openEditStudentModal('Mariama Ba')" class="flex-1 py-1.5 text-orange-600 bg-orange-50 rounded-lg text-xs font-medium hover:bg-orange-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Modifier
                        </button>
                        <button onclick="toggleStudentStatus('Mariama Ba', 'desactiver')" class="flex-1 py-1.5 text-red-600 bg-red-50 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                            Désactiver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 5 : Pagination compacte -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-3 mb-5">
    <p class="text-xs text-gray-500">
        Affichage de <span class="font-semibold text-gray-700">1</span> à <span class="font-semibold text-gray-700">4</span> sur <span class="font-semibold text-gray-700">254</span> étudiants
    </p>
    <nav class="flex items-center gap-1">
        <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-xs font-medium">1</button>
        <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">2</button>
        <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">3</button>
        <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">4</button>
        <button class="px-3 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">5</button>
        <button class="px-2 py-1 border border-gray-200 rounded-lg text-xs text-gray-600 hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
        </button>
    </nav>
</div>


<!-- ========================================== -->
<!-- MODALS COMPACTES -->
<!-- ========================================== -->

<!-- SECTION 6 : Modal Ajouter Étudiant compact -->
<div id="modalAddStudent" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalAddStudent').classList.add('hidden')"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full rounded-xl">
            <div class="bg-white px-4 pt-4 pb-3 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Nouvel étudiant</h3>
                    <button onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form id="studentCreateForm" action="<?= BASE_URL ?>/utilisateurs/create" method="POST" class="space-y-4">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nom complet -->
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Nom complet *</label>
                            <input type="text" name="nom" required class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition" placeholder="Ex: Aminata Diop">
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition" placeholder="aminata@edu.sn">
                        </div>
                        
                        <!-- Téléphone -->
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Téléphone *</label>
                            <input type="tel" name="telephone" required class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition" placeholder="+221 77 123 45 67">
                        </div>
                        
                        <!-- Cohorte -->
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Cohorte *</label>
                            <select name="cohorte_id" required class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                                <option value="">Sélectionner une cohorte</option>
                                <?php foreach ($cohortes as $cohorte): ?>
                                    <option value="<?= (int)$cohorte['id'] ?>">
                                        <?php
                                            $deptName = $cohorte['department_name'] ?? ($cohorte['departmentName'] ?? '');
                                            $label = trim(($deptName ? ($deptName . ' - ') : '') . ($cohorte['name'] ?? ''));
                                        ?>
                                        <?= htmlspecialchars($label) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        
                        <input type="hidden" name="role" value="etudiant">
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-5 sm:flex sm:flex-row-reverse gap-2">
                <button type="button" onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">Annuler</button>
                <button type="submit" form="studentCreateForm" id="studentCreateSubmit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">Créer étudiant</button>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 7 : Modal Modifier Étudiant compact -->
<div id="modalEditStudent" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalEditStudent').classList.add('hidden')"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full rounded-xl">
            <div class="bg-white px-4 pt-4 pb-3 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Modifier l'étudiant</h3>
                    <button onclick="document.getElementById('modalEditStudent').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i class="ti ti-x text-xl"></i></button>
                </div>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3">
                            <img src="https://i.pravatar.cc/150?u=1" class="w-14 h-14 rounded-full object-cover border-2 border-gray-200">
                            <button type="button" class="px-2 py-1 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700">Changer</button>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Nom complet</label>
                            <input type="text" value="Aminata Diop" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" value="aminata.diop@edu.sn" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="tel" value="+221 77 123 45 67" class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Département</label>
                            <select class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                                <option value="informatique" selected>Informatique</option>
                                <option value="gestion">Gestion</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Rôle</label>
                            <select class="w-full px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50 focus:bg-white transition">
                                <option value="etudiant" selected>Étudiant</option>
                                <option value="delegue">Délégué</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-5 sm:flex sm:flex-row-reverse gap-2">
                <button onclick="document.getElementById('modalEditStudent').classList.add('hidden')" class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">Annuler</button>
                <button class="px-4 py-1.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 8 : Modal Détails Étudiant compact -->
<div id="modalDetail" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalDetail').classList.add('hidden')"></div>
        <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-md sm:w-full rounded-xl">
            <div class="bg-white p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Détails étudiant</h3>
                    <button onclick="document.getElementById('modalDetail').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i class="ti ti-x text-xl"></i></button>
                </div>
                <div class="flex flex-col items-center text-center mb-5">
                    <img src="https://i.pravatar.cc/150?u=1" class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 mb-3">
                    <h4 class="text-base font-bold text-gray-800">Aminata Diop</h4>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700 mt-1">Actif</span>
                </div>
                <div class="space-y-2 mb-5">
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <i class="ti ti-mail text-gray-400 text-sm"></i> <span>aminata.diop@edu.sn</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <i class="ti ti-phone text-gray-400 text-sm"></i> <span>+221 77 123 45 67</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <i class="ti ti-building text-gray-400 text-sm"></i> <span>Informatique</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <i class="ti ti-user text-gray-400 text-sm"></i> <span>Étudiant</span>
                    </div>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 text-center">
                    <p class="text-xs font-semibold text-gray-600 mb-2">QR Code d'identification</p>
                    <div class="w-32 h-32 bg-white p-1 rounded-lg mx-auto mb-3 flex items-center justify-center border border-gray-200">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=AminataDiop123" alt="QR Code" class="w-28 h-28">
                    </div>
                    <div class="flex gap-2 justify-center">
                        <button class="px-2 py-1 bg-white border border-gray-200 rounded-lg text-xs text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                            <i class="ti ti-download text-sm"></i> Télécharger
                        </button>
                        <button class="px-2 py-1 bg-white border border-gray-200 rounded-lg text-xs text-gray-700 hover:bg-gray-50 flex items-center gap-1">
                            <i class="ti ti-printer text-sm"></i> Imprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <table class="student-table">

        <thead>

            <tr>
                <th>Étudiant</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Département</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        <tr>

    <td data-label="Étudiant" class="student-info">
        <span><img src="" alt=""></span>
        <div>
            <h4>Moussa</h4>
            <span>1</span>
        </div>

<!-- Modal QR Agrandi compact -->
<div id="modalQRDetail" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalQRDetail').classList.add('hidden')"></div>
        <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-sm sm:w-full rounded-xl text-center p-5">
            <button onclick="document.getElementById('modalQRDetail').classList.add('hidden')" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"><i class="ti ti-x text-xl"></i></button>
            <h3 class="text-base font-bold text-gray-800 mb-4">QR Code</h3>
            <div class="w-48 h-48 bg-white p-3 rounded-xl mx-auto mb-4 flex items-center justify-center border border-gray-200">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=AminataDiop123" alt="QR Code" class="w-40 h-40">
            </div>
            <div class="flex gap-2 justify-center">
                <button class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700 flex items-center gap-1">
                    <i class="ti ti-download text-sm"></i> Télécharger
                </button>
                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs hover:bg-gray-50 flex items-center gap-1">
                    <i class="ti ti-printer text-sm"></i> Imprimer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 9 : Modal Import CSV compact -->
<div id="modalImportCSV" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="document.getElementById('modalImportCSV').classList.add('hidden')"></div>
        <div class="inline-block align-middle bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full rounded-xl">
            <div class="bg-white p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Importation CSV</h3>
                    <button onclick="document.getElementById('modalImportCSV').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i class="ti ti-x text-xl"></i></button>
                </div>
                <div id="csvDropZone" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 hover:border-blue-400 transition cursor-pointer">
                    <i class="ti ti-upload text-3xl text-gray-400 mb-2"></i>
                    <p class="text-sm font-medium text-gray-700">Déposez votre fichier CSV ici</p>
                    <p class="text-xs text-gray-500 mt-1">ou</p>
                    <button type="button" onclick="document.getElementById('csvFileInput').click()" class="mt-2 px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700">Choisir un fichier</button>
                    <input type="file" id="csvFileInput" accept=".csv" class="hidden">
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <a href="#" class="text-xs text-blue-600 hover:text-blue-800 flex items-center gap-1">
                        <i class="ti ti-download text-sm"></i> Télécharger modèle
                    </a>
                    <div class="flex gap-2">
                        <button onclick="document.getElementById('modalImportCSV').classList.add('hidden')" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs hover:bg-gray-50">Annuler</button>
                        <button class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700">Importer</button>
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

