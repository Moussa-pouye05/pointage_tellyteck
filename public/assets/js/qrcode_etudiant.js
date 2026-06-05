// Éléments du DOM
const btnEnableCamera = document.getElementById('btn-enable-camera');
const btnStopCamera = document.getElementById('btn-stop-camera');
const cameraVideo = document.getElementById('camera-video');
const cameraPlaceholdere = document.getElementById('camera-placeholder');
const scanFramee = document.getElementById('scan-frame');
const scanSuccesse = document.getElementById('scan-success');
const scanTimee = document.getElementById('scan-time');
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
    cameraPlaceholdere.classList.add('hidden');
    scanFramee.classList.remove('opacity-0');
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
    alert('Impossible d accéder à la caméra : ' + err.message);
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
  cameraPlaceholdere.classList.remove('hidden');
  scanFramee.classList.add('opacity-0');
  btnEnableCamera.disabled = false;
  btnEnableCamera.classList.remove('opacity-50', 'cursor-not-allowed');
  btnStopCamera.disabled = true;
  btnStopCamera.classList.add('opacity-50', 'cursor-not-allowed');
  scanSuccesse.classList.add('hidden');
});

// Simuler la détection d'un QR code
function simulateQRScan() {
  // Afficher l'heure actuelle
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  scanTimee.textContent = `${hours}:${minutes}`;
  
  // Afficher l'alerte de succès
  scanSuccesse.classList.remove('hidden');
  
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
