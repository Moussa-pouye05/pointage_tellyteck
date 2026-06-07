(function() {
    // Fonctions pour les modales
    function openDepartmentModal() {
        const modal = document.getElementById('departmentModal');
        if (!modal) {
            console.warn('departmentModal introuvable');
            return;
        }

        modal.classList.remove('hidden');
    }

    function closeDepartmentModal() {
        const modal = document.getElementById('departmentModal');
        if (!modal) {
            return;
        }

        modal.classList.add('hidden');
    }

    function openCohorteModal(mode = 'create', cohort = null) {
        const modal = document.getElementById('cohorteModal');
        if (!modal) {
            console.warn('cohorteModal introuvable');
            return;
        }

        const title = modal.querySelector('.modal-title');
        const submitLabel = document.getElementById('cohorteSubmitLabel');
        const cohorteId = document.getElementById('cohorteId');
        const form = document.getElementById('cohorteForm');

        if (!title || !submitLabel || !cohorteId || !form) {
            console.warn('Éléments de formulaire cohorte manquants');
            return;
        }

        const departmentSelect = form.querySelector('[name="department_id"]');
        const nameInput = form.querySelector('[name="name"]');
        const startTimeInput = form.querySelector('[name="start_time"]');
        const endTimeInput = form.querySelector('[name="end_time"]');
        const statusSelect = form.querySelector('[name="is_active"]');

        if (!departmentSelect || !nameInput || !startTimeInput || !endTimeInput || !statusSelect) {
            console.warn('Certains champs du formulaire cohorte sont manquants');
            return;
        }

        form.reset();
        cohorteId.value = '';
        form.querySelectorAll('input[name="work_days[]"]').forEach(input => input.checked = false);

        if (mode === 'edit' && cohort) {
            title.textContent = 'Modifier la cohorte';
            submitLabel.textContent = 'Sauvegarder';
            cohorteId.value = cohort.id || '';
            departmentSelect.value = cohort.departmentId || '';
            nameInput.value = cohort.name || '';
            startTimeInput.value = cohort.startTime || '';
            endTimeInput.value = cohort.endTime || '';
            statusSelect.value = cohort.isActive || '1';

            if (cohort.workDays) {
                const selectedDays = cohort.workDays.split(',').map(day => day.trim());
                form.querySelectorAll('input[name="work_days[]"]').forEach(input => {
                    input.checked = selectedDays.includes(input.value);
                });
            }
        } else {
            title.textContent = 'Nouvelle Cohorte';
            submitLabel.textContent = 'Créer';
        }

        modal.classList.remove('hidden');
    }

    function closeCohorteModal() {
        const modal = document.getElementById('cohorteModal');
        if (!modal) {
            return;
        }

        modal.classList.add('hidden');
    }

    function normalizeWorkDays(workDaysRaw) {
        // workDaysRaw attendu: "1,2,5" (ou "")
        const daysNames = {
            1: 'Lundi',
            2: 'Mardi',
            3: 'Mercredi',
            4: 'Jeudi',
            5: 'Vendredi',
            6: 'Samedi',
            7: 'Dimanche',
        };

        const raw = (workDaysRaw ?? '').toString().trim();
        if (!raw) return '';

        const parts = raw.split(',').map(p => p.trim()).filter(Boolean);
        const labels = parts.map(p => {
            const n = Number(p);
            return daysNames[n] || p;
        });

        return labels.join(', ');
    }

    function openCohorteDetailModal(button) {
        if (!button || !button.dataset) {
            console.warn('Bouton detail cohorte invalide');
            return;
        }

        const modal = document.getElementById('cohorteDetailModal');
        if (!modal) {
            console.warn('cohorteDetailModal introuvable');
            return;
        }

        const fields = {
            cohorteDetailName: button.dataset.name || '',
            cohorteDetailDepartment: button.dataset.departmentName || '',
            cohorteDetailWorkDays: normalizeWorkDays(button.dataset.workDays),
            cohorteDetailHours: `${button.dataset.startTime || ''} - ${button.dataset.endTime || ''}`,
            cohorteDetailStatus: button.dataset.isActive === '1' ? 'Actif' : 'Inactif',
            cohorteDetailCreatedAt: button.dataset.createdAt || '',
        };

        Object.entries(fields).forEach(([id, value]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = value;
            }
        });

        modal.classList.remove('hidden');
    }


    function closeCohorteDetailModal() {
        const modal = document.getElementById('cohorteDetailModal');
        if (!modal) {
            return;
        }

        modal.classList.add('hidden');
    }

    function editCohorte(button) {
        if (!button || !button.dataset) {
            console.warn('Bouton modifier cohorte invalide');
            return;
        }

        openCohorteModal('edit', {
            id: button.dataset.id,
            departmentId: button.dataset.departmentId,
            name: button.dataset.name,
            workDays: button.dataset.workDays,
            startTime: button.dataset.startTime,
            endTime: button.dataset.endTime,
            isActive: button.dataset.isActive,
        });
    }

    function toggleCohorte(id, isActive) {
        if (!id) {
            console.warn('Identifiant de cohorte manquant pour toggle');
            return;
        }

        const csrfTokenElement = document.querySelector('#cohorteForm input[name="csrf_token"]');
        const csrfToken = csrfTokenElement ? csrfTokenElement.value : '';

        // URL la plus robuste selon la structure du projet (XAMPP / index.php front controller)
        // base : origine (http://localhost)
        const base = (window.APP_BASE_URL || window.location.origin || '').replace(/\/$/, '');
        // basePath : chemin "monté" de l’app si jamais elle n’est pas à la racine (ex: /pointage_tellyteck)
        const basePath = (window.location.pathname || '').replace(/\/public\/?.*$/, '');
        const candidateUrls = [
            // cas simple: /cohorte/toggle
            `${base}/cohorte/toggle`,
            // cas front controller: /index.php/cohorte/toggle
            `${base}/index.php/cohorte/toggle`,
            // cas où l’app est sous un sous-dossier
            `${base}${window.location.pathname.replace(/\/[^/]*$/, '')}/cohorte/toggle`,
            // fallback sous-dossier via current path
            `${base}${basePath}/cohorte/toggle`,
        ];

        // Sécurité: si on n'a pas de basePath, /cohorte/toggle doit matcher avec routes.php
        const url = `${base}/cohorte/toggle`;



        if (!csrfToken) {
            console.error('toggleCohorte: csrf_token introuvable');
        }

        postToUrl(url, {
            csrf_token: csrfToken,
            id,
            is_active: isActive,
        });
    }


    function viewDepartment(id) {
        showToast('Affichage du département');
    }

    function editDepartment(id) {
        openDepartmentModal();
    }

    function deactivateDepartment(id) {
        showToast('Département désactivé avec succès');
    }

    function postToUrl(url, params) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        Object.keys(params).forEach(key => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = params[key];
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    }

    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        if (!toast || !toastMessage) {
            return;
        }

        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }

    function normalizeText(text) {
        return (text || '').toString().trim().toLowerCase();
    }

    function getCohorteCards() {
        const container = document.getElementById('cohortesCardsContainer');
        return container ? Array.from(container.querySelectorAll('.cohort-card')) : [];
    }

    function updateCohorteList() {
        const cards = getCohorteCards();
        const query = normalizeText(document.getElementById('searchInput')?.value || '');
        const status = document.getElementById('statusFilter')?.value || '';
        const emptyMessage = document.getElementById('cohorteEmptyMessage');

        const filteredCards = cards.filter(card => {
            const name = normalizeText(card.dataset.name);
            const departmentName = normalizeText(card.dataset.departmentName);
            const cardStatus = normalizeText(card.dataset.status);
            const searchMatch = !query || name.includes(query) || departmentName.includes(query);
            const statusMatch = !status || cardStatus === status;
            return searchMatch && statusMatch;
        });

        const total = filteredCards.length;
        const totalPages = Math.max(1, Math.ceil(total / 6));
        currentPage = Math.min(currentPage, totalPages);

        const startIndex = (currentPage - 1) * 6;
        const endIndex = startIndex + 6;

        cards.forEach(card => card.classList.add('hidden'));
        filteredCards.slice(startIndex, endIndex).forEach(card => card.classList.remove('hidden'));

        if (emptyMessage) {
            emptyMessage.classList.toggle('hidden', total !== 0);
        }

        const totalCount = document.getElementById('cohorteTotalCount');
        const rangeStart = document.getElementById('cohorteRangeStart');
        const rangeEnd = document.getElementById('cohorteRangeEnd');
        const countLabel = document.getElementById('cohorteCount');

        if (countLabel) {
            countLabel.textContent = `${total} cohorte${total > 1 ? 's' : ''}`;
        }

        if (totalCount) {
            totalCount.textContent = total;
        }

        if (rangeStart && rangeEnd) {
            if (total === 0) {
                rangeStart.textContent = '0';
                rangeEnd.textContent = '0';
            } else {
                rangeStart.textContent = `${startIndex + 1}`;
                rangeEnd.textContent = `${Math.min(endIndex, total)}`;
            }
        }

        renderPagination(total, totalPages);
    }

    function renderPagination(total, totalPages) {
        const container = document.getElementById('cohortePagination');
        if (!container) {
            return;
        }

        container.innerHTML = '';

        // Toujours afficher les boutons si totalPages > 1
        if (totalPages <= 1) {
            container.classList.add('hidden');
            return;
        }

        container.classList.remove('hidden');


        const createButton = (label, page, disabled = false, active = false) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = label;
            button.className = `px-3 py-1.5 text-sm rounded-lg transition-colors ${active ? 'font-semibold text-white bg-blue-600 border border-blue-600' : 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50'}`;
            if (disabled) {
                button.disabled = true;
                button.className = 'px-3 py-1.5 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed';
            } else {
                button.addEventListener('click', () => {
                    currentPage = page;
                    updateCohorteList();
                });
            }
            return button;
        };

        container.appendChild(createButton('«', Math.max(1, currentPage - 1), currentPage === 1));

        for (let i = 1; i <= totalPages; i += 1) {
            container.appendChild(createButton(i, i, false, currentPage === i));
        }

        container.appendChild(createButton('»', Math.min(totalPages, currentPage + 1), currentPage === totalPages));
    }

    function resetFilters() {
        const searchInputEl = document.getElementById('searchInput');
        const statusFilterEl = document.getElementById('statusFilter');

        if (searchInputEl) {
            searchInputEl.value = '';
        }
        if (statusFilterEl) {
            statusFilterEl.value = '';
        }

        currentPage = 1;
        updateCohorteList();
        showToast('Filtres réinitialisés');
    }

    let currentPage = 1;

    function initCohorteFilterEvents() {
        const searchInputEl = document.getElementById('searchInput');
        const statusFilterEl = document.getElementById('statusFilter');

        if (searchInputEl) {
            searchInputEl.addEventListener('input', () => {
                currentPage = 1;
                updateCohorteList();
            });
        }

        if (statusFilterEl) {
            statusFilterEl.addEventListener('change', () => {
                currentPage = 1;
                updateCohorteList();
            });
        }

        updateCohorteList();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCohorteFilterEvents);
    } else {
        initCohorteFilterEvents();
    }

    // Fermer les modales avec la touche Echap
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeDepartmentModal();
            closeCohorteModal();
            closeCohorteDetailModal();
        }
    });

    window.openDepartmentModal = openDepartmentModal;
    window.closeDepartmentModal = closeDepartmentModal;
    window.openCohorteModal = openCohorteModal;
    window.closeCohorteModal = closeCohorteModal;
    window.openCohorteDetailModal = openCohorteDetailModal;
    window.closeCohorteDetailModal = closeCohorteDetailModal;
    window.editCohorte = editCohorte;
    window.toggleCohorte = toggleCohorte;
    window.resetFilters = resetFilters;
})();
