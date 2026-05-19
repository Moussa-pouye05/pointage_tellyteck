<div class="min-h-screen flex items-center justify-center bg-slate-900/95 backdrop-blur-md p-4">
    <div class="flex flex-col sm:flex-row max-w-4xl w-full bg-white/10 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden">
        <!-- Section Image / Branding - visible en haut sur mobile -->
        <div class="sm:w-1/2 bg-gradient-to-br from-slate-800 to-slate-900 p-6 sm:p-8 flex flex-col justify-center items-center text-white">
            <div class="text-center">
                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold mb-2 sm:mb-4">Bienvenue</h2>
                <p class="text-white/80 text-xs sm:text-sm">Connectez-vous pour accéder à votre espace de pointage</p>
            </div>
        </div>

        <!-- Section Formulaire - visible en bas sur mobile -->
        <div class="sm:w-1/2 p-6 sm:p-8 bg-white/95 backdrop-blur-sm">
            <!-- Titre du formulaire -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Pointage Tellyteck</h1>
                <p class="text-gray-500 text-xs sm:text-sm mt-2">Veuillez vous identifier</p>
            </div>

            <!-- Message d'erreur (affichage optionnel) -->
            <div class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600 text-xs sm:text-sm" id="errorMessage">
                <!-- Le message d'erreur s'affichera ici si transmission d'erreur -->
                Identifiants incorrects
            </div>

            <!-- Formulaire de connexion -->
            <form action="<?= BASE_URL ?>/login" method="POST" class="space-y-4 sm:space-y-6">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

                <!-- Champ Email -->
                <div class="space-y-1 sm:space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="email">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="block w-full pl-9 sm:pl-10 pr-3 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-slate-600 focus:border-slate-600 transition-all duration-200 outline-none text-sm sm:text-base"
                            required 
                            placeholder="exemple@email.com"
                        >
                    </div>
                </div>

                <!-- Champ Mot de passe -->
                <div class="space-y-1 sm:space-y-2">
                    <label class="block text-sm font-medium text-gray-700" for="password">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="block w-full pl-9 sm:pl-10 pr-3 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-slate-600 focus:border-slate-600 transition-all duration-200 outline-none text-sm sm:text-base"
                            required 
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                <!-- Options supplémentaires -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer">
                        <!-- <input type="checkbox" class="rounded border-gray-300 text-slate-600 focus:ring-slate-500">
                        <span class="ml-2 text-xs sm:text-sm text-gray-600">Se souvenir de moi</span> -->
                    </label>
                    <a href="<?= BASE_URL ?>/forgot-password" class="text-xs sm:text-sm text-slate-600 hover:text-slate-700 font-medium">Mot de passe oublié ?</a>
                </div>

                <!-- Bouton Connexion -->
                <button class="w-full bg-slate-900 text-white py-2.5 sm:py-3 px-4 rounded-lg font-medium hover:from-slate-800 hover:to-slate-900 transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 shadow-lg text-sm sm:text-base" type="submit">
                    Se connecter
                </button>
            </form>
        </div>
    </div>
</div>
