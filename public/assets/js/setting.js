  // Géolocalisation
    const getLocationBtn = document.getElementById('getLocation');
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    if (getLocationBtn) {
        getLocationBtn.addEventListener('click', () => {
            if (navigator.geolocation) {
                getLocationBtn.disabled = true;
                getLocationBtn.innerHTML = '<svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Chargement...';
                
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        latitudeInput.value = position.coords.latitude.toFixed(6);
                        longitudeInput.value = position.coords.longitude.toFixed(6);
                        getLocationBtn.disabled = false;
                        getLocationBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> Utiliser ma position actuelle';
                        
                        showToast('Position récupérée avec succès !');
                    },
                    (error) => {
                        getLocationBtn.disabled = false;
                        getLocationBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> Utiliser ma position actuelle';
                        
                        let message = 'Erreur de géolocalisation';
                        switch(error.code) {
                            case error.PERMISSION_DENIED: message = 'Permission refusée'; break;
                            case error.POSITION_UNAVAILABLE: message = 'Position indisponible'; break;
                            case error.TIMEOUT: message = 'Délai dépassé'; break;
                        }
                        showToast(message, 'error');
                    }
                );
            } else {
                showToast('Géolocalisation non supportée', 'error');
            }
        });
    }

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-6 right-6 z-50 bg-gray-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 transform transition-all duration-300`;
        toast.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ${type === 'success' ? 'text-green-400' : 'text-red-400'}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                ${type === 'success' 
                    ? '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />'
                    : '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />'
                }
            </svg>
            <span>${message}</span>
        `;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }