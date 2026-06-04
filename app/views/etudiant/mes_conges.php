<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-5xl p-6">
        <!-- SECTION 1 : En-tête de page -->
<section class="mb-8">
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">Mes Congés</h1>
      <p class="text-gray-600 mt-2">Gérez vos demandes d'absence et de congé</p>
    </div>
    <button id="btn-new-request" class="flex items-center justify-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-colors shadow-sm hover:shadow-md">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 5l0 14"></path>
        <path d="M5 12l14 0"></path>
      </svg>
      Nouvelle demande
    </button>
  </div>
</section>

<!-- SECTION 2 : Cartes statistiques -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <!-- Carte 1 : Demandes totales -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Demandes totales</p>
        <p class="text-3xl font-bold text-gray-900 mt-2" id="stat-total">12</p>
      </div>
      <div class="p-3 bg-blue-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-calendar" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#2563eb" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">En attente</p>
        <p class="text-3xl font-bold text-yellow-600 mt-2" id="stat-pending">3</p>
      </div>
      <div class="p-3 bg-yellow-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ca8a04" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
          <path d="M12 7v5l3 3"></path>
        </svg>
      </div>
    </div>
  </div>

  <!-- Carte 3 : Approuvées -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Approuvées</p>
        <p class="text-3xl font-bold text-green-600 mt-2" id="stat-approved">7</p>
      </div>
      <div class="p-3 bg-green-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M5 12l5 5l10 -10"></path>
        </svg>
      </div>
    </div>
  </div>

  <!-- Carte 4 : Refusées -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Refusées</p>
        <p class="text-3xl font-bold text-red-600 mt-2" id="stat-rejected">2</p>
      </div>
      <div class="p-3 bg-red-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#dc2626" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M18 6l-12 12"></path>
          <path d="M6 6l12 12"></path>
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 3 : Filtres -->
<section class="bg-white rounded-xl shadow-sm p-6 mb-8">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Recherche par motif -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Recherche par motif</label>
      <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
          <path d="M21 21l-6 -6"></path>
        </svg>
        <input type="text" id="filter-motif" placeholder="Rechercher un motif..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      </div>
    </div>

    <!-- Filtre statut -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
      <select id="filter-status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <option value="">Tous les statuts</option>
        <option value="approved">Approuvé</option>
        <option value="pending">En attente</option>
        <option value="rejected">Refusé</option>
      </select>
    </div>

    <!-- Filtre date -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
      <input type="date" id="filter-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
  </div>
</section>

<!-- SECTION 4 : Tableau des demandes -->
<section class="bg-white rounded-xl shadow-sm p-6 mb-8">
  <h2 class="text-xl font-semibold text-gray-900 mb-4">Historique des demandes</h2>
  
  <div class="overflow-x-auto">
    <table class="w-full">
      <thead>
        <tr class="border-b border-gray-200">
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Type de congé</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Date début</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Date fin</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Motif</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Statut</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Pièce jointe</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Action</th>
        </tr>
      </thead>
      <tbody id="requests-table-body">
        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4 text-gray-900">Congé maladie</td>
          <td class="py-3 px-4 text-gray-700">01/06/2026</td>
          <td class="py-3 px-4 text-gray-700">03/06/2026</td>
          <td class="py-3 px-4 text-gray-700">Fièvre</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
              Approuvé
            </span>
          </td>
          <td class="py-3 px-4">
            <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1" onclick="downloadFile('certificat.pdf')">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 9l3 3l-3 3"></path>
                <path d="M9 14h6"></path>
                <path d="M9 11h6"></path>
              </svg>
              certificat.pdf
            </button>
          </td>
          <td class="py-3 px-4">
            <div class="flex gap-2">
              <button class="btn-view-data p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                </svg>
              </button>
              <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('certificat.pdf')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M7 11l5 5l5 -5"></path>
                  <path d="M12 4l0 12"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4 text-gray-900">Absence exceptionnelle</td>
          <td class="py-3 px-4 text-gray-700">10/06/2026</td>
          <td class="py-3 px-4 text-gray-700">12/06/2026</td>
          <td class="py-3 px-4 text-gray-700">Mariage familial</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
              En attente
            </span>
          </td>
          <td class="py-3 px-4">
            <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1" onclick="downloadFile('invitation.pdf')">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 9l3 3l-3 3"></path>
                <path d="M9 14h6"></path>
                <path d="M9 11h6"></path>
              </svg>
              invitation.pdf
            </button>
          </td>
          <td class="py-3 px-4">
            <div class="flex gap-2">
              <button class="btn-view-data p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="2">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                </svg>
              </button>
              <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('invitation.pdf')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M7 11l5 5l5 -5"></path>
                  <path d="M12 4l0 12"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4 text-gray-900">Rendez-vous médical</td>
          <td class="py-3 px-4 text-gray-700">15/06/2026</td>
          <td class="py-3 px-4 text-gray-700">15/06/2026</td>
          <td class="py-3 px-4 text-gray-700">Consultation médecin</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
              En attente
            </span>
          </td>
          <td class="py-3 px-4 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-off inline" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 3l18 18"></path>
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11"></path>
            </svg>
          </td>
          <td class="py-3 px-4">
            <div class="flex gap-2">
              <button class="btn-view-data p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="3">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                </svg>
              </button>
              <button class="p-2 text-gray-400 cursor-not-allowed" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M7 11l5 5l5 -5"></path>
                  <path d="M12 4l0 12"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4 text-gray-900">Motif familial</td>
          <td class="py-3 px-4 text-gray-700">20/05/2026</td>
          <td class="py-3 px-4 text-gray-700">22/05/2026</td>
          <td class="py-3 px-4 text-gray-700">Obsèques</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
              Refusé
            </span>
          </td>
          <td class="py-3 px-4">
            <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1" onclick="downloadFile('certificat_deces.pdf')">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-text" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 9l3 3l-3 3"></path>
                <path d="M9 14h6"></path>
                <path d="M9 11h6"></path>
              </svg>
              certificat_deces.pdf
            </button>
          </td>
          <td class="py-3 px-4">
            <div class="flex gap-2">
              <button class="btn-view-data p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                </svg>
              </button>
              <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" onclick="downloadFile('certificat_deces.pdf')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                  <path d="M7 11l5 5l5 -5"></path>
                  <path d="M12 4l0 12"></path>
                </svg>
              </button>
            </div>
          </td>
        </tr>
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4 text-gray-900">Autre</td>
          <td class="py-3 px-4 text-gray-700">25/06/2026</td>
          <td class="py-3 px-4 text-gray-700">26/06/2026</td>
          <td class="py-3 px-4 text-gray-700">Rendez-vous administratif</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
              Approuvé
            </span>
          </td>
          <td class="py-3 px-4 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-file-off inline" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 3l18 18"></path>
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11"></path>
            </svg>
          </td>
          <td class="py-3 px-4">
            <div class="flex gap-2">
              <button class="btn-view-data p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" data-id="5">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                </svg>
              </button>
              <button class="p-2 text-gray-400 cursor-not-allowed" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
</section>

<!-- SECTION 5 : Modal Nouvelle demande -->
<div id="modal-new-request" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-opacity opacity-0">
  <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto transform scale-95 transition-transform">
    <div class="p-6">
      <!-- En-tête du modal -->
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Nouvelle demande de congé</h2>
        <button id="close-modal-new" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M18 6l-12 12"></path>
            <path d="M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Formulaire -->
      <form id="form-new-request" class="space-y-5">
        <!-- Champ 1 : Type de congé -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Type de congé *</label>
          <select id="request-type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Sélectionner un type</option>
            <option value="maladie">Congé maladie</option>
            <option value="absence_exceptionnelle">Absence exceptionnelle</option>
            <option value="rendez_v medical">Rendez-vous médical</option>
            <option value="motif_familial">Motif familial</option>
            <option value="autre">Autre</option>
          </select>
        </div>

        <!-- Champ 2 : Date début -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de début *</label>
          <input type="date" id="request-start-date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <!-- Champ 3 : Date fin -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin *</label>
          <input type="date" id="request-end-date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <!-- Champ 4 : Motif -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Motif *</label>
          <textarea id="request-motif" rows="4" required placeholder="Décrivez le motif de votre demande..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
        </div>

        <!-- Champ 5 : Pièce justificative -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Pièce justificative</label>
          <div class="flex items-center gap-4">
            <input type="file" id="request-file" accept=".pdf,.jpg,.jpeg,.png" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <span id="file-name" class="text-sm text-gray-500 max-w-xs truncate"></span>
          </div>
          <p class="text-xs text-gray-500 mt-1">Formats acceptés : PDF, JPG, PNG</p>
        </div>

        <!-- Champ 6 : Résumé de la demande -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Résumé de la demande</label>
          <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <p class="text-sm text-blue-800" id="request-summary">
              Veuillez sélectionner les dates pour voir la durée.
            </p>
          </div>
        </div>

        <!-- Boutons -->
        <div class="flex gap-3 pt-4">
          <button type="button" id="cancel-request" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
            Annuler
          </button>
          <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Envoyer la demande
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- SECTION 6 : Modal Détails -->
<div id="modal-details" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-opacity opacity-0">
  <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto transform scale-95 transition-transform">
    <div class="p-6">
      <!-- En-tête du modal -->
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Détails de la demande</h2>
        <button id="close-modal-details" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M18 6l-12 12"></path>
            <path d="M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Contenu du modal -->
      <div class="space-y-4">
        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Type de congé</span>
          <span id="detail-type" class="text-sm font-semibold text-gray-900">Congé maladie</span>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Date de début</span>
          <span id="detail-start-date" class="text-sm font-semibold text-gray-900">01/06/2026</span>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Date de fin</span>
          <span id="detail-end-date" class="text-sm font-semibold text-gray-900">03/06/2026</span>
        </div>

        <div class="p-3 bg-gray-50 rounded-lg">
          <span class="block text-sm font-medium text-gray-600 mb-1">Motif complet</span>
          <p id="detail-motif" class="text-sm text-gray-900">Fièvre, fatigue et malaise général</p>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Pièce jointe</span>
          <span id="detail-file" class="text-sm text-blue-600 hover:text-blue-800 cursor-pointer">certificat.pdf</span>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Date de création</span>
          <span id="detail-created" class="text-sm font-semibold text-gray-900">28/05/2026</span>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
          <span class="text-sm font-medium text-gray-600">Statut</span>
          <span id="detail-status" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
            Approuvé
          </span>
        </div>
      </div>

      <!-- Bouton fermer -->
      <div class="flex gap-3 pt-6">
        <button id="close-modal-details-btn" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
          Fermer
        </button>
      </div>
    </div>
  </div>
</div>


    </div>
</main>
