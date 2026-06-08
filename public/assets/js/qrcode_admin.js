
    // Données des étudiants
    let students = [
        { id: 1, matricule: "ETU-001", name: "Fatou Ba", filiere: "Développement Web", phone: "77 123 45 67" },
        { id: 2, matricule: "ETU-002", name: "Moussa Diop", filiere: "Digital", phone: "77 234 56 78" },
        { id: 3, matricule: "ETU-003", name: "Awa Ndiaye", filiere: "Bureautique", phone: "77 345 67 89" },
        { id: 4, matricule: "ETU-004", name: "Ibrahima Diallo", filiere: "Développement Web", phone: "77 456 78 90" },
        { id: 5, matricule: "ETU-005", name: "Mariama Sow", filiere: "Digital", phone: "77 567 89 01" },
        { id: 6, matricule: "ETU-006", name: "Cheikh Fall", filiere: "Bureautique", phone: "77 678 90 12" },
        { id: 7, matricule: "ETU-007", name: "Aminata Kane", filiere: "Réseaux", phone: "77 789 01 23" },
        { id: 8, matricule: "ETU-008", name: "Papa Sarr", filiere: "Sécurité Informatique", phone: "77 890 12 34" }
    ];
    
    let currentPage = 1;
    let rowsPerPage = 5;
    let currentSearchTerm = '';
    let currentStudent = null;
    let qrcode = null;
    let videoStream = null;
    let scanning = false;
    
    // Variables pour le scan QR
    let video = document.getElementById('videoPreview');
    let canvas = document.getElementById('canvas');
    let context = canvas.getContext('2d');
    
    // Fonction pour afficher les étudiants
    function renderStudents() {
        let filteredStudents = students;
        if (currentSearchTerm) {
            filteredStudents = students.filter(s => 
                s.matricule.toLowerCase().includes(currentSearchTerm.toLowerCase()) ||
                s.name.toLowerCase().includes(currentSearchTerm.toLowerCase()) ||
                s.filiere.toLowerCase().includes(currentSearchTerm.toLowerCase())
            );
        }
        
        const totalPages = Math.ceil(filteredStudents.length / rowsPerPage);
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const paginatedStudents = filteredStudents.slice(start, end);
        
        document.getElementById('startCount').textContent = filteredStudents.length > 0 ? start + 1 : 0;
        document.getElementById('endCount').textContent = Math.min(end, filteredStudents.length);
        document.getElementById('totalCount').textContent = filteredStudents.length;
        document.getElementById('pageIndicator').textContent = `${currentPage} / ${totalPages || 1}`;
        
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage === totalPages || totalPages === 0;
        
        const tbody = document.getElementById('studentsTableBody');
        tbody.innerHTML = paginatedStudents.map(s => `
            <tr class="table-row hover:bg-gray-50 transition-all">
                <td class="px-3 md:px-4 py-2 md:py-3 text-sm font-mono text-gray-700">${s.matricule}</td>
                <td class="px-3 md:px-4 py-2 md:py-3 text-sm font-medium text-gray-800">${s.name}</td>
                <td class="px-3 md:px-4 py-2 md:py-3 text-sm text-gray-600">${s.filiere}</td>
                <td class="px-3 md:px-4 py-2 md:py-3 text-sm text-gray-600">${s.phone}</td>
                <td class="px-3 md:px-4 py-2 md:py-3">
                    <button onclick="generateQRForStudent('${s.matricule}|${s.name}|${s.filiere}')" class="text-purple-600 hover:text-purple-800">
                        <i class="ti ti-qrcode text-lg"></i>
                    </button>
                </td>
                <td class="px-3 md:px-4 py-2 md:py-3 text-center">
                    <button onclick="deleteStudent(${s.id})" class="text-red-600 hover:text-red-800">
                        <i class="ti ti-trash text-lg"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    }
    
    // Générer QR code
    function generateQRForStudent(studentValue) {
        if (qrcode) {
            qrcode.clear();
        }
        qrcode = new QRCode(document.getElementById("qrcode"), {
            text: studentValue,
            width: 200,
            height: 200,
            colorDark: "#4f46e5",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        document.getElementById('printQRBtn').disabled = false;
        currentStudent = studentValue;
        
        // Afficher une notification
        const parts = studentValue.split('|');
        showNotification(`QR Code généré pour ${parts[1]}`, 'success');
    }
    
    // Imprimer QR code
    document.getElementById('printQRBtn').addEventListener('click', () => {
        const qrImage = document.querySelector('#qrcode img');
        if (qrImage) {
            const printWindow = window.open('', '_blank');
            const studentInfo = currentStudent ? currentStudent.split('|') : ['', '', ''];
            printWindow.document.write(`
                <html>
                <head><title>QR Code - ${studentInfo[1]}</title></head>
                <body style="display:flex;justify-content:center;align-items:center;height:100vh;flex-direction:column;font-family:Arial">
                    <img src="${qrImage.src}" style="width:300px;height:300px">
                    <h3>${studentInfo[1]}</h3>
                    <p>Matricule: ${studentInfo[0]}</p>
                    <p>Filière: ${studentInfo[2]}</p>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    });
    
    // Démarrer caméra pour scan
    async function startCamera() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } });
            video.srcObject = stream;
            videoStream = stream;
            video.play();
            document.getElementById('startCameraBtn').disabled = true;
            document.getElementById('stopCameraBtn').disabled = false;
            document.getElementById('scanStatus').innerHTML = '<span class="h-2 w-2 rounded-full bg-green-400 pulse"></span> Caméra active - Scan en cours';
            startScanning();
        } catch (err) {
            console.error("Erreur caméra:", err);
            document.getElementById('scanStatus').innerHTML = '<span class="h-2 w-2 rounded-full bg-red-400"></span> Impossible d\'accéder à la caméra';
            showNotification("Impossible d'accéder à la caméra", 'error');
        }
    }
    
    // Arrêter caméra
    function stopCamera() {
        if (videoStream) {
            videoStream.getTracks().forEach(track => track.stop());
            video.srcObject = null;
            videoStream = null;
        }
        scanning = false;
        document.getElementById('startCameraBtn').disabled = false;
        document.getElementById('stopCameraBtn').disabled = true;
        document.getElementById('scanStatus').innerHTML = '<span class="h-2 w-2 rounded-full bg-green-400 pulse"></span> Caméra inactive';
    }
    
    // Scanner le QR code
    function startScanning() {
        scanning = true;
        const scanInterval = setInterval(() => {
            if (!scanning) {
                clearInterval(scanInterval);
                return;
            }
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, canvas.width, canvas.height);
                if (code) {
                    // QR code détecté
                    const qrData = code.data;
                    const parts = qrData.split('|');
                    if (parts.length >= 3) {
                        showScanResult(parts[0], parts[1], parts[2]);
                        stopCamera();
                        scanning = false;
                        clearInterval(scanInterval);
                    }
                }
            }
        }, 300);
    }
    
    // Afficher résultat du scan
    function showScanResult(matricule, name, filiere) {
        const resultDiv = document.getElementById('scanResult');
        resultDiv.classList.remove('hidden', 'success', 'error');
        resultDiv.classList.add('success');
        resultDiv.innerHTML = `
            <i class="ti ti-circle-check text-white text-lg"></i>
            <div class="text-white">
                <strong>Scan réussi !</strong><br>
                ${name} (${matricule}) - ${filiere}
            </div>
        `;
        setTimeout(() => {
            resultDiv.classList.add('hidden');
        }, 5000);
    }
    
    // Afficher notification
    function showNotification(message, type) {
        const resultDiv = document.getElementById('scanResult');
        resultDiv.classList.remove('hidden', 'success', 'error');
        resultDiv.classList.add(type === 'success' ? 'success' : 'error');
        resultDiv.innerHTML = `
            <i class="ti ti-${type === 'success' ? 'circle-check' : 'alert-circle'} text-white text-lg"></i>
            <div class="text-white">${message}</div>
        `;
        setTimeout(() => {
            resultDiv.classList.add('hidden');
        }, 3000);
    }
    
    // Supprimer étudiant
    window.deleteStudent = (id) => {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')) {
            students = students.filter(s => s.id !== id);
            renderStudents();
        }
    };
    
    // Générer QR depuis le tableau
    window.generateQRForStudent = (studentValue) => {
        generateQRForStudent(studentValue);
    };
    
    // Événements
    document.getElementById('generateQRBtn').addEventListener('click', () => {
        const select = document.getElementById('studentSelect');
        if (select.value) {
            generateQRForStudent(select.value);
        } else {
            showNotification('Veuillez sélectionner un étudiant', 'error');
        }
    });
    
    document.getElementById('startCameraBtn').addEventListener('click', startCamera);
    document.getElementById('stopCameraBtn').addEventListener('click', stopCamera);
    document.getElementById('searchBtn').addEventListener('click', () => {
        currentSearchTerm = document.getElementById('searchInput').value;
        currentPage = 1;
        renderStudents();
    });
    document.getElementById('resetBtn').addEventListener('click', () => {
        document.getElementById('searchInput').value = '';
        currentSearchTerm = '';
        currentPage = 1;
        renderStudents();
    });
    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderStudents();
        }
    });
    document.getElementById('nextPage').addEventListener('click', () => {
        const filteredStudents = students.filter(s => 
            s.matricule.toLowerCase().includes(currentSearchTerm.toLowerCase()) ||
            s.name.toLowerCase().includes(currentSearchTerm.toLowerCase()) ||
            s.filiere.toLowerCase().includes(currentSearchTerm.toLowerCase())
        );
        const totalPages = Math.ceil(filteredStudents.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderStudents();
        }
    });
    
    // Modal
    const modal = document.getElementById('studentModal');
    document.getElementById('openModalBtn').addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });
    const closeModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.getElementById('studentForm').reset();
    };
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('cancelModalBtn').addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
    
    // Ajouter étudiant
    document.getElementById('studentForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const newStudent = {
            id: students.length + 1,
            matricule: document.getElementById('matricule').value,
            name: document.getElementById('fullName').value,
            filiere: document.getElementById('filiere').value,
            phone: document.getElementById('phone').value
        };
        students.push(newStudent);
        
        // Ajouter à la liste déroulante
        const select = document.getElementById('studentSelect');
        const option = document.createElement('option');
        option.value = `${newStudent.matricule}|${newStudent.name}|${newStudent.filiere}`;
        option.textContent = `${newStudent.matricule} - ${newStudent.name} (${newStudent.filiere})`;
        select.appendChild(option);
        
        closeModal();
        renderStudents();
        showNotification(`Étudiant ${newStudent.name} ajouté avec succès`, 'success');
    });
    
    // Rendu initial
    renderStudents();
