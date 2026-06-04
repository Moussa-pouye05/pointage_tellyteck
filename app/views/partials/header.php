<header id="header" class="bg-white border-b border-slate-200 w-full md:w-[84%] fixed top-0 right-0 z-40">
    <div class="px-4 py-2 flex items-center justify-end">
        <!-- Icône à gauche (visible seulement quand sidebar est cachée) -->
        <button id="menuBtn" type="button" class="block md:hidden absolute left-4" aria-controls="sideBare" aria-expanded="false">
            <span class="inline-flex items-center gap-2">
                <i class="ti ti-menu-2 text-2xl" aria-hidden="true"></i>
            </span>
        </button>

        <!-- Image à droite (toujours à droite) -->
        <div class="relative">
            <img 
                src="https://ui-avatars.com/api/?background=1e293b&color=fff&name=User" 
                alt="photo de profil" 
                class="w-10 h-10 rounded-full object-cover"
            >
        </div>
    </div>
</header>
