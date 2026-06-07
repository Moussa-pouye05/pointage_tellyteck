<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="mx-auto max-w-7xl p-4 md:p-5">
        
        <!-- Section Titre -->
        <section class="mb-5">
            <div class="flex items-center gap-2 mb-1">
                <div class="w-1 h-5 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
                <h1 class="text-lg md:text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Pointage Étudiant
                </h1>
            </div>
            <p class="text-gray-500 text-xs ml-3">Scannez un QR Code ou présentez votre QR personnel</p>
        </section>

        <!-- Section Statistiques -->
        <section class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
            <!-- Carte Présences ce mois -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Présences ce mois</p>
                        <p class="text-xl font-bold text-blue-600 mt-1" id="stat-presences">18</p>
                    </div>
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#2563eb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                            <path d="M16 12l2 2l4 -4"></path>
                            <path d="M16 5v2a2 2 0 0 1 -2 2h-2"></path>
                            <path d="M8 5v2a2 2 0 0 0 2 2h2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte Retards -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Retards</p>
                        <p class="text-xl font-bold text-orange-600 mt-1" id="stat-retards">2</p>
                    </div>
                    <div class="p-2 bg-orange-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ea580c" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 7v5l3 3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte Absences -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Absences</p>
                        <p class="text-xl font-bold text-red-600 mt-1" id="stat-absences">1</p>
                    </div>
                    <div class="p-2 bg-red-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x-circle" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#dc2626" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M9 9l6 6"></path>
                            <path d="M15 9l-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Carte Taux de présence -->
            <div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-all card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Taux de présence</p>
                        <p class="text-xl font-bold text-green-600 mt-1" id="stat-taux">90%</p>
                    </div>
                    <div class="p-2 bg-green-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-chart-bar" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12l4 0"></path>
                            <path d="M3 18l4 0"></path>
                            <path d="M3 6l4 0"></path>
                            <path d="M13 6l4 0"></path>
                            <path d="M13 12l4 0"></path>
                            <path d="M13 18l4 0"></path>
                            <path d="M17 6l4 0"></path>
                            <path d="M17 12l4 0"></path>
                            <path d="M17 18l4 0"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Principale : Grille Responsive -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
            <!-- Carte Scanner QR -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 card-hover">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-qrcode text-blue-500" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M18 14v4"></path>
                        <path d="M18 18h4"></path>
                    </svg>
                    Scanner un QR Code
                </h2>
                
                <!-- Zone Caméra -->
                <div class="relative bg-gray-100 rounded-lg overflow-hidden mb-3" id="camera-container" style="height: 260px;">
                    <video id="camera-video" class="w-full h-full object-cover" autoplay playsinline></video>
                    <div id="camera-placeholder" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-camera-off mx-auto mb-2" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="#9ca3af" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8.273 4.28l2.054 1.027 1.673 -1.307 4 3.5 2.5 .25"></path>
                                <path d="M10 11c0 .69 .28 1.316 .733 1.769"></path>
                                <path d="M12 8a2 2 0 0 1 2 2"></path>
                                <path d="M3 3l18 18"></path>
                                <path d="M5 7c-.53 0 -1 .213 -1.5 .5"></path>
                                <path d="M3 14v2"></path>
                                <path d="M3 18v1"></path>
                                <path d="M5 19c.5 .187 1 .287 1.5 .287"></path>
                                <path d="M10 19h2"></path>
                                <path d="M14 19h3"></path>
                                <path d="M19 19c.564 0 .939 -.187 1.125 -.5"></path>
                            </svg>
                            <p class="text-xs text-gray-500">Caméra inactive</p>
                        </div>
                    </div>
                    <div id="scan-frame" class="absolute inset-0 border-2 border-blue-500 rounded-lg opacity-0 transition-opacity"></div>
                </div>

                <!-- Boutons -->
                <div class="flex gap-2 mb-3">
                    <button id="btn-enable-camera" class="flex-1 bg-blue-600 from-blue-600 to-blue-700 text-white px-3 py-1.5 text-sm rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all font-semibold shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-camera inline mr-1" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                            <path d="M12 13a3 3 0 1 0 0 6a3 3 0 0 0 0 -6"></path>
                        </svg>
                        Activer
                    </button>
                    <button id="btn-stop-camera" class="flex-1 bg-gray-100 text-gray-700 px-3 py-1.5 text-sm rounded-lg hover:bg-gray-200 transition-all font-semibold" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-player-stop inline mr-1" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 5m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                        </svg>
                        Arrêter
                    </button>
                </div>

                <!-- Alerte de succès -->
                <div id="scan-success" class="hidden bg-green-50 border border-green-200 rounded-lg p-2 mb-3">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-check-circle text-green-600" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <div>
                            <p class="text-xs font-semibold text-green-800">Présence enregistrée</p>
                            <p class="text-xs text-green-700" id="scan-time"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte Mon QR Code -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 card-hover">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-qrcode text-purple-500" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M7 17l0 .01"></path>
                        <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M7 7l0 .01"></path>
                        <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        <path d="M17 7l0 .01"></path>
                        <path d="M14 14l3 0"></path>
                        <path d="M20 14l0 .01"></path>
                        <path d="M14 14l0 3"></path>
                        <path d="M14 20l3 0"></path>
                        <path d="M17 17l3 0"></path>
                        <path d="M20 17l0 3"></path>
                    </svg>
                    Mon QR Code
                </h2>
                
                <div class="flex flex-col items-center">
                    <div class="bg-white p-3 rounded-lg shadow-sm mb-3 border border-gray-100">
                        <img id="student-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=ETU-2024-001234" alt="QR Code Étudiant" class="w-36 h-36">
                    </div>
                    
                    <div class="text-center mb-3">
                        <h3 class="text-sm font-bold text-gray-800">Moussa Pouye</h3>
                        <p class="text-xs text-gray-500">Matricule: ETU-2024-001234</p>
                        <p class="text-xs text-gray-500">Classe: Informatique 2A</p>
                    </div>
                    
                    <div class="flex gap-2 w-full">
                        <button id="btn-download-qr" class="flex-1 bg-gray-100 text-gray-700 px-3 py-1.5 text-xs rounded-lg hover:bg-gray-200 transition-all flex items-center justify-center gap-1 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M7 11l5 5l5 -5"></path>
                                <path d="M12 4l0 12"></path>
                            </svg>
                            Télécharger
                        </button>
                        <button id="btn-print-qr" class="flex-1 bg-gray-100 text-gray-700 px-3 py-1.5 text-xs rounded-lg hover:bg-gray-200 transition-all flex items-center justify-center gap-1 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-printer" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 9v2h12v-2"></path>
                                <path d="M6 18h12v-3h-12z"></path>
                                <path d="M19 5a2 2 0 0 0 -2 -2h-9a2 2 0 0 0 -2 2v11h14v-11z"></path>
                                <path d="M9 14v2"></path>
                            </svg>
                            Imprimer
                        </button>
                    </div>
                    
                    <p class="text-xs text-gray-400 text-center mt-3">
                        Présentez ce QR Code à l'administration pour un pointage manuel.
                    </p>
                </div>
            </div>
        </section>

        <!-- Section Historique -->
        <section class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden mb-5">
            <div class="p-3 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-history text-blue-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 8l0 4l2 2"></path>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg>
                    Historique récent
                </h2>
            </div>
            
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full min-w-[500px]">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Date</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Heure</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Mode</th>
                            <th class="text-left py-2 px-3 text-xs font-semibold text-gray-500">Statut</th>
                        </tr>
                    </thead>
                    <tbody id="history-table-body" class="divide-y divide-gray-50">
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">03 juin 2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">08:15</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">QR Scan</span>
                            </td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Présent</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">02 juin 2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">08:25</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">QR Scan</span>
                            </td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-700">Retard</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">30 mai 2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">08:10</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Manuel</span>
                            </td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Présent</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">29 mai 2026</td>
                            <td class="py-2 px-3 text-sm text-gray-500">--:--</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">--</span>
                            </td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Absent</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-2 px-3 text-sm text-gray-700">28 mai 2026</td>
                            <td class="py-2 px-3 text-sm text-gray-600">08:12</td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">QR Scan</span>
                            </td>
                            <td class="py-2 px-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Présent</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-gray-50 px-3 py-2 border-t border-gray-100 flex flex-col sm:flex-row gap-2 justify-between items-center">
                <div class="text-xs text-gray-500">
                    Affichage de <span class="font-semibold text-gray-700">1</span> à <span class="font-semibold text-gray-700">5</span> sur <span class="font-semibold text-gray-700">12</span> pointages
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

        <!-- Section Notifications -->
        <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
            <h2 class="text-sm font-bold text-gray-700 flex items-center gap-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-bell-ringing text-yellow-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.5 -1.727"></path>
                    <path d="M3 6.727a11.05 11.05 0 0 1 2.5 -1.727"></path>
                </svg>
                Notifications
            </h2>
            
            <div class="space-y-2">
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock text-blue-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 7v5l3 3"></path>
                        </svg>
                        <span class="text-xs text-gray-600">Dernier pointage</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-800">03 juin 2026, 08:15</span>
                </div>
                
                <div class="flex items-center justify-between p-2 bg-red-50 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x-circle text-red-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 9l6 6"></path>
                            <path d="M15 9l-6 6"></path>
                        </svg>
                        <span class="text-xs text-gray-600">Nombre d'absences</span>
                    </div>
                    <span class="text-xs font-semibold text-red-600">1</span>
                </div>
                
                <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock text-orange-500" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 7v5l3 3"></path>
                        </svg>
                        <span class="text-xs text-gray-600">Nombre de retards</span>
                    </div>
                    <span class="text-xs font-semibold text-orange-600">2</span>
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
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>

<script>
    // Simulation JavaScript pour la caméra
    const btnEnable = document.getElementById('btn-enable-camera');
    const btnStop = document.getElementById('btn-stop-camera');
    const cameraPlaceholder = document.getElementById('camera-placeholder');
    const scanFrame = document.getElementById('scan-frame');
    const scanSuccess = document.getElementById('scan-success');
    const scanTime = document.getElementById('scan-time');
    
    btnEnable.addEventListener('click', function() {
        cameraPlaceholder.style.display = 'none';
        scanFrame.style.opacity = '1';
        btnEnable.disabled = true;
        btnStop.disabled = false;
        
        // Simulation de scan après 3 secondes
        setTimeout(() => {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
            scanTime.textContent = timeStr;
            scanSuccess.classList.remove('hidden');
            
            // Ajouter au tableau
            const tbody = document.getElementById('history-table-body');
            const newRow = document.createElement('tr');
            newRow.className = 'border-b border-gray-100 hover:bg-gray-50';
            const today = new Date().toLocaleDateString('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric' });
            newRow.innerHTML = `
                <td class="py-2 px-3 text-sm text-gray-700">${today}</td>
                <td class="py-2 px-3 text-sm text-gray-600">${timeStr}</td>
                <td class="py-2 px-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">QR Scan</span></td>
                <td class="py-2 px-3"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Présent</span></td>
            `;
            tbody.insertBefore(newRow, tbody.firstChild);
            
            setTimeout(() => {
                scanSuccess.classList.add('hidden');
            }, 3000);
        }, 3000);
    });
    
    btnStop.addEventListener('click', function() {
        cameraPlaceholder.style.display = 'flex';
        scanFrame.style.opacity = '0';
        btnEnable.disabled = false;
        btnStop.disabled = true;
        scanSuccess.classList.add('hidden');
    });
    
    // Téléchargement QR Code
    document.getElementById('btn-download-qr').addEventListener('click', function() {
        const qrImg = document.getElementById('student-qr');
        const link = document.createElement('a');
        link.download = 'qr_code_moussa_pouye.png';
        link.href = qrImg.src;
        link.click();
    });
    
    // Impression QR Code
    document.getElementById('btn-print-qr').addEventListener('click', function() {
        const qrImg = document.getElementById('student-qr');
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
            <head><title>QR Code - Moussa Pouye</title></head>
            <body style="display:flex;justify-content:center;align-items:center;height:100vh;flex-direction:column;font-family:Arial">
                <img src="${qrImg.src}" style="width:300px;height:300px">
                <h3>Moussa Pouye</h3>
                <p>Matricule: ETU-2024-001234</p>
                <p>Classe: Informatique 2A</p>
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    });
</script>
