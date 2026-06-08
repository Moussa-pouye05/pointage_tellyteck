<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>


<style>
    /* Animations personnalisées */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes scan {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100%); }
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    @keyframes floatSoft {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-6px); }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.5s ease-out;
    }
    
    .float-soft {
        animation: floatSoft 6s ease-in-out infinite;
    }
    
    .scan-line {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent, rgba(59,130,246,.18), transparent);
        animation: scan 2.4s linear infinite;
        pointer-events: none;
    }
    
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.15);
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        height: 6px;
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #e2e8f0;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #94a3b8;
        border-radius: 10px;
    }
    
    .input-focus {
        transition: all 0.2s ease;
    }
    
    .input-focus:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    /* Modal styles */
    .modal {
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    
    .modal.active {
        opacity: 1;
        visibility: visible;
    }
    
    .modal-content {
        animation: fadeInUp 0.3s ease-out;
    }
    
    /* QR Code container */
    #qrcode {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    #qrcode img {
        width: 200px;
        height: 200px;
        border-radius: 1rem;
    }
    
    @media (max-width: 640px) {
        #qrcode img {
            width: 160px;
            height: 160px;
        }
    }
    
    /* Video preview */
    #videoPreview {
        transform: scaleX(-1);
    }
    
    /* Scanner result */
    .scan-result {
        transition: all 0.3s ease;
    }
    
    .scan-result.success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .scan-result.error {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }
</style>



<main class="min-h-screen ml-6 md:ml-[260px] mt-16 bg-linear-to-br from-gray-50 via-white to-gray-100">
    <div class="p-3 md:p-5">
        
        <!-- En-tête -->
        <div class="mb-5 md:mb-6 animate-fadeInUp">
            <div class="flex items-center gap-2 md:gap-3 mb-1 md:mb-2">
                <div class="w-1 h-5 md:h-7 bg-purple-500 from-purple-500 to-purple-600 rounded-full"></div>
                <h1 class="text-xl md:text-2xl lg:text-3xl font-bold bg-gray-500 from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Gestion des QR Codes
                </h1>
            </div>
            <p class="text-gray-500 text-xs md:text-sm ml-3 md:ml-4">
                Gérez les QR codes des étudiants en informatique
            </p>
        </div>

        <!-- Topbar avec recherche -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3 md:p-4 mb-5 animate-fadeInUp">
            <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                <div class="flex-1 relative">
                    <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm md:text-base"></i>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Rechercher un étudiant par nom, matricule ou filière..." 
                           class="w-full pl-9 md:pl-10 pr-3 py-1.5 md:py-2 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" />
                </div>
                <div class="flex gap-2">
                    <button id="searchBtn" class="px-3 md:px-4 py-1.5 md:py-2 bg-blue-400 from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg text-sm font-semibold flex items-center gap-1 shadow-sm">
                        <i class="ti ti-search text-sm"></i>
                        <span>Rechercher</span>
                    </button>
                    <button id="resetBtn" class="px-3 md:px-4 py-1.5 md:py-2 border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 rounded-lg text-sm font-semibold flex items-center gap-1">
                        <i class="ti ti-refresh text-sm"></i>
                        <span>Réinitialiser</span>
                    </button>
                    <button id="openModalBtn" class="px-3 md:px-4 py-1.5 md:py-2 bg-blue-400 from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg text-sm font-semibold flex items-center gap-1 shadow-sm">
                        <i class="ti ti-user-plus text-sm"></i>
                        <span>Nouvel étudiant</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Grille des cartes -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-5 md:mb-6">
            
            <!-- Génération QR Code pour étudiants -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden card-hover animate-fadeInUp">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-3 mb-4 md:mb-5">
                        <div class="h-10 w-10 md:h-12 md:w-12 rounded-xl bg-purple-50 border border-purple-100 flex items-center justify-center">
                            <i class="ti ti-qrcode text-xl md:text-2xl text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base md:text-lg font-bold text-gray-800">Générer QR Code</h3>
                            <p class="text-xs text-gray-500">Générez et imprimez le QR code pour les étudiants</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="text-xs md:text-sm font-semibold text-gray-700 mb-1 md:mb-2 block">
                                <i class="ti ti-id text-sm mr-1"></i>
                                Sélectionner un étudiant
                            </label>
                            <select id="studentSelect" class="w-full px-3 py-1.5 md:py-2 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white text-sm outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                                <option value="">-- Choisir un étudiant --</option>
                                <option value="ETU-001|Fatou Ba|Développement Web">ETU-001 - Fatou Ba (Développement Web)</option>
                                <option value="ETU-002|Moussa Diop|Digital">ETU-002 - Moussa Diop (Digital)</option>
                                <option value="ETU-003|Awa Ndiaye|Bureautique">ETU-003 - Awa Ndiaye (Bureautique)</option>
                                <option value="ETU-004|Ibrahima Diallo|Développement Web">ETU-004 - Ibrahima Diallo (Développement Web)</option>
                                <option value="ETU-005|Mariama Sow|Digital">ETU-005 - Mariama Sow (Digital)</option>
                                <option value="ETU-006|Cheikh Fall|Bureautique">ETU-006 - Cheikh Fall (Bureautique)</option>
                                <option value="ETU-007|Aminata Kane|Réseaux">ETU-007 - Aminata Kane (Réseaux)</option>
                                <option value="ETU-008|Papa Sarr|Sécurité Info">ETU-008 - Papa Sarr (Sécurité Informatique)</option>
                            </select>
                        </div>
                        
                        <div class="flex justify-center py-4">
                            <div id="qrcode" class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm"></div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-2">
                            <button id="generateQRBtn" class="px-3 md:px-4 py-1.5 md:py-2 rounded-lg bg-purple-500 from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white text-sm font-semibold flex items-center justify-center gap-2 shadow-sm transition-all">
                                <i class="ti ti-qrcode text-sm"></i>
                                Générer
                            </button>
                            <button id="printQRBtn" class="px-3 md:px-4 py-1.5 md:py-2 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-sm font-semibold flex items-center justify-center gap-2 transition-all" disabled>
                                <i class="ti ti-printer text-sm"></i>
                                Imprimer
                            </button>
                        </div>
                        
                        <div class="rounded-lg border border-blue-200 bg-blue-50 px-3 md:px-4 py-2 text-blue-700 text-xs md:text-sm flex items-start gap-2">
                            <i class="ti ti-info-circle text-blue-600 text-base mt-0.5"></i>
                            <span>Les étudiants scannent ce QR code avec leur téléphone pour valider leur présence aux cours.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scanner QR Code avec caméra -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden card-hover animate-fadeInUp">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-3 mb-4 md:mb-5">
                        <div class="h-10 w-10 md:h-12 md:w-12 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center">
                            <i class="ti ti-camera text-xl md:text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base md:text-lg font-bold text-gray-800">Scanner QR Code</h3>
                            <p class="text-xs text-gray-500">Utilisez la caméra pour scanner le QR code étudiant</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="relative overflow-hidden rounded-xl border border-gray-200 bg-gray-100 from-gray-900 to-gray-800 min-h-[280px] flex items-center justify-center">
                            <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_center,rgba(59,130,246,.08),transparent_55%)]"></div>
                            <div class="absolute inset-x-8 top-8 h-px bg-green-400/40"></div>
                            <div class="absolute inset-x-8 bottom-8 h-px bg-green-400/20"></div>
                            <div class="absolute inset-y-8 left-8 w-px bg-green-400/20"></div>
                            <div class="absolute inset-y-8 right-8 w-px bg-green-400/20"></div>
                            <div class="scan-line rounded-xl"></div>
                            
                            <!-- Vidéo caméra -->
                            <video id="videoPreview" class="absolute inset-0 w-full h-full object-cover rounded-xl" autoplay muted playsinline></video>
                            <canvas id="canvas" class="absolute inset-0 w-full h-full hidden"></canvas>

                            <div id="scanOverlay" class="relative text-center px-4 md:px-6 z-10">
                                <div class="mx-auto mb-3 md:mb-4 h-16 w-16 md:h-20 md:w-20 rounded-2xl bg-green-500/20 border border-green-400/30 flex items-center justify-center float-soft backdrop-blur-sm">
                                    <i class="ti ti-camera text-3xl md:text-4xl text-green-400"></i>
                                </div>
                                <p class="text-sm md:text-base font-semibold text-white">Scanner un QR Code</p>
                                <p class="text-xs text-gray-300 mt-1">Positionnez le QR code dans le cadre</p>
                                <div id="scanStatus" class="mt-3 md:mt-4 inline-flex items-center gap-2 px-3 md:px-4 py-1.5 md:py-2 rounded-full bg-green-500/20 backdrop-blur-sm border border-green-400/30 text-green-300 text-xs md:text-sm">
                                    <span class="h-2 w-2 rounded-full bg-green-400 pulse"></span>
                                    Caméra inactive
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button id="startCameraBtn" class="flex-1 px-3 md:px-4 py-1.5 md:py-2 rounded-lg bg-green-500 from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white text-sm font-semibold flex items-center justify-center gap-2 shadow-sm transition-all">
                                <i class="ti ti-camera text-sm"></i>
                                Démarrer caméra
                            </button>
                            <button id="stopCameraBtn" class="flex-1 px-3 md:px-4 py-1.5 md:py-2 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-sm font-semibold flex items-center justify-center gap-2 transition-all" disabled>
                                <i class="ti ti-pause text-sm"></i>
                                Arrêter
                            </button>
                        </div>

                        <!-- Résultat du scan -->
                        <div id="scanResult" class=" rounded-lg px-3 md:px-4 py-2 text-sm flex items-center gap-2 scan-result"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des étudiants -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden animate-fadeInUp">
            <div class="p-4 md:p-5 border-b border-gray-100">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h3 class="text-base md:text-lg font-bold text-gray-800 flex items-center gap-2">
                            <i class="ti ti-users text-purple-600"></i>
                            Liste des étudiants
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Filières: Développement Web, Digital, Bureautique, Réseaux, Sécurité</p>
                    </div>
                    <button class="text-xs md:text-sm px-3 md:px-4 py-1.5 md:py-2 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 transition-all">
                        Exporter
                    </button>
                </div>
            </div>

            <div class="table-container overflow-x-auto custom-scrollbar">
                <table class="min-w-[800px] md:min-w-full w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Matricule</th>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nom complet</th>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Filière</th>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Téléphone</th>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">QR Code</th>
                            <th class="px-3 md:px-4 py-2 md:py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="studentsTableBody" class="divide-y divide-gray-100">
                        <!-- Les données seront injectées dynamiquement -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-gray-50 px-3 md:px-4 py-2 md:py-3 border-t border-gray-100 flex flex-col sm:flex-row gap-2 justify-between items-center">
                <div class="text-xs text-gray-500 flex items-center gap-1">
                    <i class="ti ti-chart-pie text-xs"></i>
                    <span>Affichage de <span id="startCount">1</span> à <span id="endCount">5</span> sur <span id="totalCount">8</span> étudiants</span>
                </div>
                <div class="flex items-center gap-1 md:gap-2">
                    <button id="prevPage" class="px-2 md:px-3 py-1 border border-gray-200 rounded-md text-xs text-gray-600 hover:bg-gray-100 transition-all flex items-center gap-1">
                        <i class="ti ti-chevron-left text-xs"></i>
                        <span class="hidden sm:inline">Précédent</span>
                    </button>
                    <span id="pageIndicator" class="px-2 md:px-3 py-1 text-xs font-semibold text-gray-700 bg-white rounded-md border border-gray-200">1 / 2</span>
                    <button id="nextPage" class="px-2 md:px-3 py-1 border border-gray-200 rounded-md text-xs text-gray-600 hover:bg-gray-100 transition-all flex items-center gap-1">
                        <span class="hidden sm:inline">Suivant</span>
                        <i class="ti ti-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal Ajout Étudiant -->
<div id="studentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-all duration-300 p-3">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-auto transform transition-all modal-content">
        <div class="flex justify-between items-center p-4 md:p-6 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ti ti-user-plus text-blue-600 text-lg" aria-hidden="true"></i>
                </div>
                <h2 class="text-lg md:text-xl font-bold text-gray-800">Ajouter un étudiant</h2>
            </div>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition p-1 rounded-lg hover:bg-gray-100">
                <i class="ti ti-x text-xl" aria-hidden="true"></i>
            </button>
        </div>

        <form id="studentForm" class="p-4 md:p-6 space-y-4">
            <div>
                <label class="block text-xs md:text-sm font-semibold text-gray-700 mb-1 md:mb-2">
                    <i class="ti ti-id text-sm mr-1"></i>
                    Matricule
                </label>
                <input type="text" id="matricule" name="matricule" required class="w-full px-3 py-1.5 md:py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-xs md:text-sm font-semibold text-gray-700 mb-1 md:mb-2">
                    <i class="ti ti-user text-sm mr-1"></i>
                    Nom complet
                </label>
                <input type="text" id="fullName" name="fullName" required class="w-full px-3 py-1.5 md:py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-xs md:text-sm font-semibold text-gray-700 mb-1 md:mb-2">
                    <i class="ti ti-device-laptop text-sm mr-1"></i>
                    Filière
                </label>
                <select id="filiere" name="filiere" required class="w-full px-3 py-1.5 md:py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                    <option value="">-- Sélectionner --</option>
                    <option value="Développement Web">Développement Web</option>
                    <option value="Digital">Digital</option>
                    <option value="Bureautique">Bureautique</option>
                    <option value="Réseaux">Réseaux</option>
                    <option value="Sécurité Informatique">Sécurité Informatique</option>
                </select>
            </div>

            <div>
                <label class="block text-xs md:text-sm font-semibold text-gray-700 mb-1 md:mb-2">
                    <i class="ti ti-phone text-sm mr-1"></i>
                    Téléphone
                </label>
                <input type="tel" id="phone" name="phone" required class="w-full px-3 py-1.5 md:py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-blue-400 from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-2 rounded-lg transition-all font-medium text-sm shadow-md">
                    <i class="ti ti-device-floppy text-sm"></i>
                    Enregistrer
                </button>
                <button type="button" id="cancelModalBtn" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 rounded-lg transition-all font-medium text-sm">
                    <i class="ti ti-x text-sm"></i>
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    // Menu toggle pour mobile
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menuBtn');
    
    if (menuBtn && sidebar) {
        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    }
</script>
