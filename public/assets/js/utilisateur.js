
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('studentCreateForm');
        const submitButton = document.getElementById('studentCreateSubmit');

        if (form && submitButton) {
            form.addEventListener('submit', () => {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-70', 'cursor-not-allowed');
                submitButton.textContent = 'Création...';
            });
        }
    });

    // Fonctions pour les modales étudiants
    function openStudentDetailModal(name) {
        showToast('Affichage des détails de ' + name);
    }
    
    function openEditStudentModal(name) {
        showToast('Modification de ' + name);
    }
    
    function toggleStudentStatus(name, action) {
        if (action === 'activer') {
            showToast('Compte de ' + name + ' activé avec succès');
        } else {
            showToast('Compte de ' + name + ' désactivé avec succès');
        }
    }
    
    function showToast(message) {
        // Créer un toast temporaire
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 z-50 bg-gray-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3';
        toast.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>${message}</span>
        `;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

