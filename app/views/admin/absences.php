<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
<<<<<<< HEAD
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
=======
    <div class="mx-auto max-w-5xl">
      <div class="contenair">
        <h2>Tableau de bord-absences</h2>
        <div class="Card-Grid">
        <div class="carde">
            <div class="card-haut">
                <div class="icons blue"><i class="fa-solid fa-file"></i></div>
            </div>
            <div class="card-texte">
                <p>Absents aujourd'hui</p>
                <h3>128</h3>
                <p>sur 126 etudiants</p>
            </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons orange"><i class="fa-solid fa-clock"></i></div>
                </div>
                <div class="card-texte">
                    <p>Retards aujourd'hui</p>
                    <h3>128</h3>
                    <p>sur 126 etudiants</p>
                </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons green"><i class="fa-solid fa-circle-check"></i></div>
                </div>
                <div class="card-texte">
                    <p>Absencesjustifiées</p>
                    <h3>128</h3>
                    <p>ce mois</p>
                </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons move"><i class="fa-solid fa-circle-xmark"></i></div>
                </div>
                <div class="card-texte">
                    <p>Absences non justifiées</p>
                    <h3>128</h3>
                    <p>ce mois</p>
                </div>
            </div>
        </div>
       <!-- ================== les tableaux d'absences ============= -->
        <section class="Card-Flex">
            <div class="mains">
            <div class="Card-Filter">
                <input type="search" placeholder="filtrer par nom ....">
                <select name="" id="">
                    <option>Tous les status</option>
                </select>
                <select name="" id="">
                    <option>Départements</option>
                </select>
                <input type="date">
            </div>
            <div class="table">
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Departement</th>
                        <th>Date</th>
                        <th>Heur</th>
                        <th>Motif</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tr>
                        <td>khadiatou diallo</td>
                        <td>Dev</td>
                        <td>17/05/26</td>
                        <td>08h-14h</td>
                        <td>Rv Important</td>
                        <td>En_cours</td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>khadiatou diallo</td>
                        <td>Dev</td>
                        <td>17/05/26</td>
                        <td>08h-14h</td>
                        <td>Rv Important</td>
                        <td>En_cours</td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
>>>>>>> 9c3c402b47803162c65750b2a5008080681a7427
                            </div>
                        </td>
                    </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                 </table>
                 <div class="PAJINATIONS_absences">
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
            </div>
            <!-- ==================right =================== -->
             <div class="RiGht">
                <div class="clandiriers">
                    <input type="date">
                </div>
                <div class="card-absence">
                    <div class="h4">
                        <h4>Absents aujourd'hui</h4>
                        <button>Voir tout</button>
                    </div>
                    <div class="h4">
                        <p>nom:jean cissé</p>
                        <button class="absent">Absent</button>
                    </div>
                    <div class="h4">
                        <p>nom:khadiatou telly diallo</p>
                        <button class="absent">Absent</button>
                    </div>
                </div>
             </div>
        </section>
      </div>
    </div>
</main>
