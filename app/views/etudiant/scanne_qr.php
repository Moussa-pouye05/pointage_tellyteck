<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16 ">
    <div class="mx-auto max-w-5xl p-6">
       <!-- Section Titre -->
<section class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900">Pointage Étudiant</h1>
  <p class="text-gray-600 mt-2">Scannez un QR Code ou présentez votre QR personnel</p>
</section>

<!-- Section Statistiques -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <!-- Carte Présences ce mois -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Présences ce mois</p>
        <p class="text-3xl font-bold text-blue-600 mt-2" id="stat-presences">18</p>
      </div>
      <div class="p-3 bg-blue-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#2563eb" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Retards</p>
        <p class="text-3xl font-bold text-orange-600 mt-2" id="stat-retards">2</p>
      </div>
      <div class="p-3 bg-orange-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ea580c" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
          <path d="M12 7v5l3 3"></path>
        </svg>
      </div>
    </div>
  </div>

  <!-- Carte Absences -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Absences</p>
        <p class="text-3xl font-bold text-red-600 mt-2" id="stat-absences">1</p>
      </div>
      <div class="p-3 bg-red-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x-circle" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#dc2626" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
          <path d="M9 9l6 6"></path>
          <path d="M15 9l-6 6"></path>
        </svg>
      </div>
    </div>
  </div>

  <!-- Carte Taux de présence -->
  <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Taux de présence</p>
        <p class="text-3xl font-bold text-green-600 mt-2" id="stat-taux">90%</p>
      </div>
      <div class="p-3 bg-green-100 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-chart-bar" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
<section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
  <!-- Carte Scanner QR -->
  <div class="bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Scanner un QR Code</h2>
    
    <!-- Zone Caméra -->
    <div class="relative bg-gray-100 rounded-lg overflow-hidden mb-4" id="camera-container" style="height: 300px;">
      <video id="camera-video" class="w-full h-full object-cover" autoplay playsinline></video>
      <div id="camera-placeholder" class="absolute inset-0 flex items-center justify-center bg-gray-200">
        <div class="text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-camera-off mx-auto mb-3" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="#9ca3af" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 10v4a2 2 0 0 0 4 0"></path>
            <path d="M3 3l18 18"></path>
            <path d="M5 5l2 2"></path>
            <path d="M9 5l1.5 1.5"></path>
            <path d="M15 5l1 1"></path>
            <path d="M19 5l-2 2"></path>
            <path d="M5 19l2 -2"></path>
            <path d="M9 19l1.5 -1.5"></path>
            <path d="M15 19l1 -1"></path>
            <path d="M19 19l-2 -2"></path>
            <path d="M17 11a2 2 0 0 1 -4 0"></path>
          </svg>
          <p class="text-gray-500">Caméra inactive</p>
        </div>
      </div>
      <!-- Cadre de scan animé -->
      <div id="scan-frame" class="absolute inset-0 border-4 border-blue-500 rounded-lg opacity-0 transition-opacity">
        <div class="absolute top-0 left-0 w-full h-1 bg-blue-500 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-full h-1 bg-blue-500 animate-pulse"></div>
        <div class="absolute top-0 left-0 w-1 h-full bg-blue-500 animate-pulse"></div>
        <div class="absolute top-0 right-0 w-1 h-full bg-blue-500 animate-pulse"></div>
      </div>
    </div>

    <!-- Boutons -->
    <div class="flex gap-3 mb-4">
      <button id="btn-enable-camera" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
        Activer caméra
      </button>
      <button id="btn-stop-camera" class="flex-1 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" disabled>
        Arrêter caméra
      </button>
    </div>

    <!-- Alerte de succès (cachée par défaut) -->
    <div id="scan-success" class="hidden bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-check-circle text-green-600 mr-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
          <path d="M9 12l2 2l4 -4"></path>
        </svg>
        <div>
          <p class="font-semibold text-green-800">Présence enregistrée avec succès</p>
          <p class="text-sm text-green-700" id="scan-time">08:15</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Carte Mon QR Code -->
  <div class="bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Mon QR Code</h2>
    
    <div class="flex flex-col items-center">
      <!-- QR Code centré -->
      <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
        <img id="student-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=ETU-2024-001234" alt="QR Code Étudiant" class="w-48 h-48">
      </div>
      
      <!-- Informations étudiant -->
      <div class="text-center mb-4">
        <h3 class="text-lg font-semibold text-gray-900">Moussa Pouye</h3>
        <p class="text-gray-600">Matricule: ETU-2024-001234</p>
        <p class="text-gray-600">Classe: Informatique 2A</p>
      </div>
      
      <!-- Boutons d'action -->
      <div class="flex gap-3 w-full">
        <button id="btn-download-qr" class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-download" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
            <path d="M7 11l5 5l5 -5"></path>
            <path d="M12 4l0 12"></path>
          </svg>
          Télécharger
        </button>
        <button id="btn-print-qr" class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-printer" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 9v2h12v-2"></path>
            <path d="M6 18h12v-3h-12z"></path>
            <path d="M19 5a2 2 0 0 0 -2 -2h-9a2 2 0 0 0 -2 2v11h14v-11z"></path>
            <path d="M9 14v2"></path>
          </svg>
          Imprimer
        </button>
        <button id="btn-enlarge-qr" class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-maximize" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 5m0 2a2 2 0 0 1 2 -2h2"></path>
            <path d="M5 5m0 2a2 2 0 0 0 2 2h2"></path>
            <path d="M19 5m0 2a2 2 0 0 0 -2 -2h-2"></path>
            <path d="M19 5m0 2a2 2 0 0 1 -2 2h-2"></path>
            <path d="M5 19m0 -2a2 2 0 0 0 2 2h2"></path>
            <path d="M5 19m0 -2a2 2 0 0 1 -2 -2h-2"></path>
            <path d="M19 19m0 -2a2 2 0 0 1 -2 2h-2"></path>
            <path d="M19 19m0 -2a2 2 0 0 0 -2 -2h-2"></path>
          </svg>
          Agrandir
        </button>
      </div>
      
      <!-- Note sous le QR -->
      <p class="text-sm text-gray-500 text-center mt-4">
        Présentez ce QR Code à l'administration pour un pointage manuel.
      </p>
    </div>
  </div>
</section>

<!-- Section Historique -->
<section class="bg-white rounded-xl shadow-sm p-6 mb-8">
  <h2 class="text-xl font-semibold text-gray-900 mb-4">Historique récent</h2>
  
  <div class="overflow-x-auto">
    <table class="w-full">
      <thead>
        <tr class="border-b border-gray-200">
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Heure</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Mode</th>
          <th class="text-left py-3 px-4 font-semibold text-gray-700">Statut</th>
        </tr>
      </thead>
      <tbody id="history-table-body">
        <tr class="border-b border-gray-100">
          <td class="py-3 px-4 text-gray-700">03 juin 2026</td>
          <td class="py-3 px-4 text-gray-700">08:15</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
              QR Scan
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
              Présent
            </span>
          </td>
        </tr>
        <tr class="border-b border-gray-100">
          <td class="py-3 px-4 text-gray-700">02 juin 2026</td>
          <td class="py-3 px-4 text-gray-700">08:25</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
              QR Scan
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
              Retard
            </span>
          </td>
        </tr>
        <tr class="border-b border-gray-100">
          <td class="py-3 px-4 text-gray-700">30 mai 2026</td>
          <td class="py-3 px-4 text-gray-700">08:10</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
              Manuel
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
              Présent
            </span>
          </td>
        </tr>
        <tr class="border-b border-gray-100">
          <td class="py-3 px-4 text-gray-700">29 mai 2026</td>
          <td class="py-3 px-4 text-gray-700">--:--</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
              --
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
              Absent
            </span>
          </td>
        </tr>
        <tr>
          <td class="py-3 px-4 text-gray-700">28 mai 2026</td>
          <td class="py-3 px-4 text-gray-700">08:12</td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
              QR Scan
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
              Présent
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<!-- Section Notifications -->
<section class="bg-white rounded-xl shadow-sm p-6">
  <h2 class="text-xl font-semibold text-gray-900 mb-4">Notifications</h2>
  
  <div class="space-y-3">
    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock text-blue-600" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
          <path d="M12 7v5l3 3"></path>
        </svg>
        <span class="text-gray-700">Dernier pointage</span>
      </div>
      <span class="font-semibold text-gray-900">03 juin 2026, 08:15</span>
    </div>
    
    <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-x-circle text-red-600" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
          <path d="M9 9l6 6"></path>
          <path d="M15 9l-6 6"></path>
        </svg>
        <span class="text-gray-700">Nombre d'absences</span>
      </div>
      <span class="font-semibold text-red-600">1</span>
    </div>
    
    <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-clock text-orange-600" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
          <path d="M12 7v5l3 3"></path>
        </svg>
        <span class="text-gray-700">Nombre de retards</span>
      </div>
      <span class="font-semibold text-orange-600">2</span>
    </div>
  </div>
</section>

<script>
// Éléments du DOM
const btnEnableCamera = document.getElementById('btn-enable-camera');
const btnStopCamera = document.getElementById('btn-stop-camera');
const cameraVideo = document.getElementById('camera-video');
const cameraPlaceholder = document.getElementById('camera-placeholder');
const scanFrame = document.getElementById('scan-frame');
const scanSuccess = document.getElementById('scan-success');
const scanTime = document.getElementById('scan-time');
const btnDownloadQR = document.getElementById('btn-download-qr');
const btnPrintQR = document.getElementById('btn-print-qr');
const btnEnlargeQR = document.getElementById('btn-enlarge-qr');
const studentQR = document.getElementById('student-qr');

let cameraActive = false;
let stream = null;

// Activer la caméra
btnEnableCamera.addEventListener('click', async () => {
  try {
    stream = await navigator.mediaDevices.getUserMedia({ 
      video: { facingMode: 'environment' } 
    });
    cameraVideo.srcObject = stream;
    cameraActive = true;
    
    // Mettre à jour l'UI
    cameraPlaceholder.classList.add('hidden');
    scanFrame.classList.remove('opacity-0');
    btnEnableCamera.disabled = true;
    btnEnableCamera.classList.add('opacity-50', 'cursor-not-allowed');
    btnStopCamera.disabled = false;
    btnStopCamera.classList.remove('opacity-50', 'cursor-not-allowed');
    
    // Simuler la détection d'un QR code après 3 secondes
    setTimeout(() => {
      if (cameraActive) {
        simulateQRScan();
      }
    }, 3000);
  } catch (err) {
    alert('Impossible d'accéder à la caméra : ' + err.message);
  }
});

// Arrêter la caméra
btnStopCamera.addEventListener('click', () => {
  if (stream) {
    stream.getTracks().forEach(track => track.stop());
    cameraVideo.srcObject = null;
    cameraActive = false;
    stream = null;
  }
  
  // Mettre à jour l'UI
  cameraPlaceholder.classList.remove('hidden');
  scanFrame.classList.add('opacity-0');
  btnEnableCamera.disabled = false;
  btnEnableCamera.classList.remove('opacity-50', 'cursor-not-allowed');
  btnStopCamera.disabled = true;
  btnStopCamera.classList.add('opacity-50', 'cursor-not-allowed');
  scanSuccess.classList.add('hidden');
});

// Simuler la détection d'un QR code
function simulateQRScan() {
  // Afficher l'heure actuelle
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  scanTime.textContent = `${hours}:${minutes}`;
  
  // Afficher l'alerte de succès
  scanSuccess.classList.remove('hidden');
  
  // Arrêter la caméra automatiquement
  if (cameraActive) {
    btnStopCamera.click();
  }
}

// Télécharger le QR Code
btnDownloadQR.addEventListener('click', () => {
  const link = document.createElement('a');
  link.href = studentQR.src;
  link.download = 'qr-code-etudiant.png';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});

// Imprimer le QR Code
btnPrintQR.addEventListener('click', () => {
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>QR Code Étudiant</title>
        <style>
          body { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
          }
          img { max-width: 300px; }
        </style>
      </head>
      <body>
        <img src="${studentQR.src}" alt="QR Code Étudiant">
        <script>
          window.print();
          window.close();
        <\/script>
      </body>
    </html>
  `);
  printWindow.document.close();
});

// Agrandir le QR Code
btnEnlargeQR.addEventListener('click', () => {
  const modal = document.createElement('div');
  modal.style.cssText = `
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    cursor: pointer;
  `;
  
  const modalContent = document.createElement('img');
  modalContent.src = studentQR.src;
  modalContent.alt = 'QR Code Étudiant Agrandi';
  modalContent.style.cssText = 'max-width: 90%; max-height: 90%; border-radius: 8px;';
  
  modal.appendChild(modalContent);
  document.body.appendChild(modal);
  
  modal.addEventListener('click', () => {
    document.body.removeChild(modal);
  });
});

// Initialiser l'état des boutons caméra
btnStopCamera.disabled = true;
btnStopCamera.classList.add('opacity-50', 'cursor-not-allowed');
</script>
    </div>
</main>
