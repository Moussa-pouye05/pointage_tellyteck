<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>

<main class="min-h-screen ml-6 md:ml-60 mt-16 p-4 md:p-6 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="max-w-3xl mx-auto space-y-5">
        
        <!-- Carte 1 : Mon profil -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="px-5 py-3 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Mon profil</h1>
                        <p class="text-xs text-gray-500 mt-0.5">
                            <?= htmlspecialchars($user['email']) ?> · <?= htmlspecialchars($user['role']) ?>
                        </p>
                    </div>
                </div>
            </div>

            <form action="<?= BASE_URL ?>/profil" method="POST" enctype="multipart/form-data" class="p-5">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

                <!-- Photo de profil -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-4 border-b border-gray-100">
                    <div class="flex-shrink-0">
                        <?php if (!empty($user['profil'])): ?>
                            <img class="h-16 w-16 rounded-full object-cover border-2 border-blue-300" src="<?= BASE_URL . '/' . htmlspecialchars($user['profil']) ?>" alt="Photo de profil">
                        <?php else: ?>
                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                <span class="text-xl font-bold text-white"><?= strtoupper(substr($user['nom'] ?? 'U', 0, 1)) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Photo de profil</label>
                        <input class="block w-full sm:w-64 rounded-lg border border-gray-200 px-3 py-2 text-sm file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all" type="file" name="profil" accept="image/jpeg,image/png,image.webp">
                        <p class="text-xs text-gray-400 mt-1">Formats acceptés : JPG, PNG, WEBP</p>
                    </div>
                </div>

                <!-- Formulaire 2 colonnes - Champs rétrécis -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <!-- ADMIN : Voir tous les champs -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700" for="nom">Nom complet *</label>
                            <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-sm" type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required placeholder="Votre nom">
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                            <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 bg-gray-50 text-gray-500 cursor-not-allowed text-sm" type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700" for="telephone">Téléphone</label>
                            <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-sm" type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>" placeholder="+221 77 123 45 67">
                        </div>
                    <?php else: ?>
                        <!-- ÉTUDIANT : Ne voit pas nom et email -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700" for="telephone">Téléphone</label>
                            <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-sm" type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>" placeholder="+221 77 123 45 67">
                        </div>
                    <?php endif; ?>

                    <!-- Champs mot de passe avec message d'info -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700" for="password">Nouveau mot de passe</label>
                        <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-sm" type="password" id="password" name="password" minlength="8" placeholder="••••••••">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Confirmation</label>
                        <input class="block w-full rounded-lg border border-gray-200 px-3 py-2 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-sm" type="password" id="password_confirmation" name="password_confirmation" minlength="8" placeholder="••••••••">
                    </div>
                </div>

                <!-- Message d'info pour le mot de passe -->
                <div class="mt-3 p-3 bg-blue-50 border border-blue-100 rounded-lg">
                    <div class="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs text-blue-800">
                            💡 <strong>Information :</strong> Si vous ne souhaitez pas modifier votre mot de passe, laissez les champs ci-dessus vides. Votre mot de passe actuel restera inchangé.
                        </p>
                    </div>
                </div>

                <div class="mt-5 pt-4 border-t border-gray-100">
                    <button class="w-full sm:w-auto px-4 py-2 rounded-lg bg-blue-500 font-medium text-white hover:bg-blue-600 transition-all duration-200 flex items-center justify-center gap-2 text-sm shadow-sm" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>

        <!-- Carte 2 : Paramètres de Géolocalisation -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="px-5 py-3 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Paramètres de Géolocalisation</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Définissez la zone autorisée pour le pointage des étudiants</p>
                    </div>
                </div>
            </div>

            <form action="<?= BASE_URL ?>/geolocalisation/save" method="POST" class="p-5">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <!-- Latitude -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700" for="latitude">
                            Latitude
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="text" id="latitude" name="latitude" placeholder="14.716677" value="<?= htmlspecialchars($geoloc['latitude'] ?? '14.716677') ?>"
                                class="w-full rounded-lg border border-gray-200 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                        </div>
                    </div>

                    <!-- Longitude -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700" for="longitude">
                            Longitude
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="text" id="longitude" name="longitude" placeholder="-17.467686" value="<?= htmlspecialchars($geoloc['longitude'] ?? '-17.467686') ?>"
                                class="w-full rounded-lg border border-gray-200 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                        </div>
                    </div>

                    <!-- Rayon -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700" for="allowed_radius">
                            Rayon autorisé (mètres)
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <input type="number" name="allowed_radius" id="allowed_radius" min="10" value="<?= htmlspecialchars($geoloc['allowed_radius'] ?? '100') ?>"
                                class="w-full rounded-lg border border-gray-200 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                        </div>
                        <p class="text-xs text-gray-400">Distance minimale : 10 mètres</p>
                    </div>

                    <!-- Position actuelle -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">&nbsp;</label>
                        <button type="button" id="getLocation"
                            class="w-full px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition-all duration-200 flex items-center justify-center gap-2 text-sm shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Utiliser ma position actuelle
                        </button>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="mt-4 pt-3 border-t border-gray-100 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="reset"
                        class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors flex items-center justify-center gap-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Réinitialiser
                    </button>
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition-all duration-200 flex items-center justify-center gap-2 text-sm shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Script JS pour la géolocalisation -->
<script>
  
</script>