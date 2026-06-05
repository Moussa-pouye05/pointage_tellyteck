
// Données des demandes (simulées)
const requestsData = {
  1: {
    type: 'Congé maladie',
    startDate: '01/06/2026',
    endDate: '03/06/2026',
    motif: 'Fièvre, fatigue et malaise général',
    file: 'certificat.pdf',
    created: '28/05/2026',
    status: 'approved'
  },
  2: {
    type: 'Absence exceptionnelle',
    startDate: '10/06/2026',
    endDate: '12/06/2026',
    motif: 'Mariage familial en région',
    file: 'invitation.pdf',
    created: '02/06/2026',
    status: 'pending'
  },
  3: {
    type: 'Rendez-vous médical',
    startDate: '15/06/2026',
    endDate: '15/06/2026',
    motif: 'Consultation médecin généraliste',
    file: null,
    created: '03/06/2026',
    status: 'pending'
  },
  4: {
    type: 'Motif familial',
    startDate: '20/05/2026',
    endDate: '22/05/2026',
    motif: 'Obsèques d un proche',
    file: 'certificat_deces.pdf',
    created: '15/05/2026',
    status: 'rejected'
  },
  5: {
    type: 'Autre',
    startDate: '25/06/2026',
    endDate: '26/06/2026',
    motif: 'Rendez-vous administratif prèfecture',
    file: null,
    created: '20/05/2026',
    status: 'approved'
  }
};

// Éléments du DOM - Modal Nouvelle demande
const modalNewRequest = document.getElementById('modal-new-request');
const btnNewRequest = document.getElementById('btn-new-request');
const closeModalNew = document.getElementById('close-modal-new');
const cancelRequest = document.getElementById('cancel-request');
const formNewRequest = document.getElementById('form-new-request');

// Éléments du DOM - Modal Détails
const modalDetails = document.getElementById('modal-details');
const closeModalDetails = document.getElementById('close-modal-details');
const closeModalDetailsBtn = document.getElementById('close-modal-details-btn');

// Éléments du DOM - Formulaire
const requestType = document.getElementById('request-type');
const requestStartDate = document.getElementById('request-start-date');
const requestEndDate = document.getElementById('request-end-date');
const requestMotif = document.getElementById('request-motif');
const requestFile = document.getElementById('request-file');
const fileName = document.getElementById('file-name');
const requestSummary = document.getElementById('request-summary');

// Ouvrir le modal Nouvelle demande
if(btnNewRequest){
btnNewRequest.addEventListener('click', () => {
  modalNewRequest.classList.remove('hidden');
  modalNewRequest.classList.add('flex');
  setTimeout(() => {
    modalNewRequest.classList.remove('opacity-0');
    modalNewRequest.querySelector('.transform').classList.remove('scale-95');
    modalNewRequest.querySelector('.transform').classList.add('scale-100');
  }, 10);
});
}


// Fermer le modal Nouvelle demande
function closeNewRequestModal() {
  modalNewRequest.classList.add('opacity-0');
  modalNewRequest.querySelector('.transform').classList.remove('scale-100');
  modalNewRequest.querySelector('.transform').classList.add('scale-95');
  setTimeout(() => {
    modalNewRequest.classList.add('hidden');
    modalNewRequest.classList.remove('flex');
    formNewRequest.reset();
    fileName.textContent = '';
    requestSummary.textContent = 'Veuillez sélectionner les dates pour voir la durée.';
  }, 200);
}
if(closeModalNew || cancelRequest){
closeModalNew.addEventListener('click', closeNewRequestModal);
cancelRequest.addEventListener('click', closeNewRequestModal);
}


// Fermer le modal en cliquant en dehors
if(modalNewRequest){
modalNewRequest.addEventListener('click', (e) => {
  if (e.target === modalNewRequest) {
    closeNewRequestModal();
  }
});
}


// Ouvrir le modal Détails
document.querySelectorAll('.btn-view-data').forEach(button => {
  button.addEventListener('click', function() {
    const id = this.getAttribute('data-id');
    const data = requestsData[id];
    
    if (data) {
      document.getElementById('detail-type').textContent = data.type;
      document.getElementById('detail-start-date').textContent = data.startDate;
      document.getElementById('detail-end-date').textContent = data.endDate;
      document.getElementById('detail-motif').textContent = data.motif;
      document.getElementById('detail-created').textContent = data.created;
      
      if (data.file) {
        document.getElementById('detail-file').textContent = data.file;
        document.getElementById('detail-file').classList.add('cursor-pointer', 'hover:text-blue-800');
        document.getElementById('detail-file').onclick = () => downloadFile(data.file);
      } else {
        document.getElementById('detail-file').textContent = 'Aucune pièce jointe';
        document.getElementById('detail-file').classList.remove('cursor-pointer', 'hover:text-blue-800');
        document.getElementById('detail-file').onclick = null;
      }
      
      const statusBadge = document.getElementById('detail-status');
      switch(data.status) {
        case 'approved':
          statusBadge.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800';
          statusBadge.textContent = 'Approuvé';
          break;
        case 'pending':
          statusBadge.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
          statusBadge.textContent = 'En attente';
          break;
        case 'rejected':
          statusBadge.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800';
          statusBadge.textContent = 'Refusé';
          break;
      }
      
      modalDetails.classList.remove('hidden');
      modalDetails.classList.add('flex');
      setTimeout(() => {
        modalDetails.classList.remove('opacity-0');
        modalDetails.querySelector('.transform').classList.remove('scale-95');
        modalDetails.querySelector('.transform').classList.add('scale-100');
      }, 10);
    }
  });
});

// Fermer le modal Détails
function closeDetailsModal() {
  modalDetails.classList.add('opacity-0');
  modalDetails.querySelector('.transform').classList.remove('scale-100');
  modalDetails.querySelector('.transform').classList.add('scale-95');
  setTimeout(() => {
    modalDetails.classList.add('hidden');
    modalDetails.classList.remove('flex');
  }, 200);
}

if(closeModalDetails || closeModalDetailsBtn){
  closeModalDetails.addEventListener('click', closeDetailsModal);
  closeModalDetailsBtn.addEventListener('click', closeDetailsModal);
}


// Fermer le modal en cliquant en dehors
if(modalDetails){
  modalDetails.addEventListener('click', (e) => {
  if (e.target === modalDetails) {
    closeDetailsModal();
  }
});
}


// Calcul automatique du nombre de jours
function calculateDays() {
  const startDate = requestStartDate.value;
  const endDate = requestEndDate.value;
  
  if (startDate && endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);
    const diffTime = Math.abs(end - start);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    
    if (end < start) {
      requestSummary.textContent = 'Erreur : La date de fin est antérieure à la date de début.';
      requestSummary.classList.add('text-red-800');
      requestSummary.classList.remove('text-blue-800');
    } else {
      requestSummary.textContent = `Durée : ${diffDays} jour${diffDays > 1 ? 's' : ''}`;
      requestSummary.classList.remove('text-red-800');
      requestSummary.classList.add('text-blue-800');
    }
  }
}

if(requestStartDate || requestEndDate){
  requestStartDate.addEventListener('change', calculateDays);
  requestEndDate.addEventListener('change', calculateDays);
}


// Affichage du nom du fichier sélectionné
if(requestFile){
requestFile.addEventListener('change', function() {
  if (this.files && this.files[0]) {
    fileName.textContent = this.files[0].name;
  } else {
    fileName.textContent = '';
  }
});
}
// Téléchargement de fichier
function downloadFile(filename) {
  if (!filename) return;
  
  const link = document.createElement('a');
  link.href = `#download/${filename}`;
  link.download = filename;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  
  // Simulation d'un message de succès
  alert(`Téléchargement de ${filename} en cours...`);
}

// Validation et soumission du formulaire
if(formNewRequest){
formNewRequest.addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Validation simple
  const type = requestType.value;
  const startDate = requestStartDate.value;
  const endDate = requestEndDate.value;
  const motif = requestMotif.value.trim();
  
  if (!type || !startDate || !endDate || !motif) {
    alert('Veuillez remplir tous les champs obligatoires (*)');
    return;
  }
  
  if (startDate > endDate) {
    alert('La date de fin ne peut pas être antérieure à la date de début');
    return;
  }
  
  // Simulation de l'envoi
  alert('Votre demande de congé a été envoyée avec succès !');
  closeNewRequestModal();
  
  // Ici, vous ajouteriez le code pour envoyer les données au backend PHP
});
}
// Fermer les modals avec la touche Échap
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    if (!modalNewRequest.classList.contains('hidden')) {
      closeNewRequestModal();
    }
    if (!modalDetails.classList.contains('hidden')) {
      closeDetailsModal();
    }
  }
});
