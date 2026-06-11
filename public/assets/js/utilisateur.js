document.addEventListener('DOMContentLoaded', function() {
    // Gestion du formulaire de création
    const form = document.getElementById('studentCreateForm');
    const submitButton = document.getElementById('studentCreateSubmit');

    if (form && submitButton) {
        form.addEventListener('submit', function() {
            submitButton.disabled = true;
            submitButton.classList.add('opacity-70', 'cursor-not-allowed');
            submitButton.textContent = 'Création...';
        });
    }
});

// Fonction pour ouvrir le modal d'ajout
function openAddStudentModal() {
    const addModal = document.getElementById('modalAddStudent');
    const editModal = document.getElementById('modalEditStudent');
    
    if (editModal) editModal.classList.add('hidden');
    if (addModal) addModal.classList.remove('hidden');
}

// Fonction pour fermer le modal d'ajout
function closeAddStudentModal() {
    const modal = document.getElementById('modalAddStudent');
    if (modal) modal.classList.add('hidden');
}

// Fonction pour ouvrir le modal de modification
function openEditStudentModal(button) {
    // Récupérer les données de l'étudiant
    const studentData = JSON.parse(button.getAttribute('data-student'));
    
    // Récupérer les éléments du modal
    const modal = document.getElementById('modalEditStudent');
    const idInput = document.getElementById('editStudentId');
    const nomInput = document.getElementById('editStudentNom');
    const emailInput = document.getElementById('editStudentEmail');
    const telephoneInput = document.getElementById('editStudentTelephone');
    const cohorteSelect = document.getElementById('editStudentCohorte');
    
    // Vérifier que tous les éléments existent
    if (!modal || !idInput || !nomInput || !emailInput || !telephoneInput || !cohorteSelect) {
        console.error('Un ou plusieurs éléments du modal sont introuvables');
        return;
    }
    
    // Remplir les champs avec les données de l'étudiant
    idInput.value = studentData.id || '';
    nomInput.value = studentData.nom || '';
    emailInput.value = studentData.email || '';
    telephoneInput.value = studentData.telephone || '';
    cohorteSelect.value = studentData.cohorte_id || '';
    
    // Afficher le modal
    modal.classList.remove('hidden');
}

// Fonction pour fermer le modal de modification
function closeEditStudentModal() {
    const modal = document.getElementById('modalEditStudent');
    if (modal) {
        modal.classList.add('hidden');
    }
}

// Fermer les modals en cliquant sur Echap
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeAddStudentModal();
        closeEditStudentModal();
    }
});

// Empêcher la fermeture du modal si on clique à l'intérieur
document.querySelectorAll('#modalAddStudent .relative, #modalEditStudent .relative').forEach(modalContent => {
    modalContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});