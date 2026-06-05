<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-5xl">
    <div class="main">
    <div class="title">
        <h2>Demandes de congé</h2>
        <p>Tableau de bord / Demandes de congé</p>
    </div>
    <div class="cards">
        <div class="card">
            <div class="card-top">
                <div class="icon blue"><i class="fa-solid fa-file"></i></div>
            </div>
            <div class="card-text">
                <p>Total demandes</p>
                <h3>128</h3>
                <p>Toutes les demandes</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon orange"><i class="fa-solid fa-clock"></i></div>
            </div>
            <div class="card-text">
                <p>En attente</p>
                <h3>128</h3>
                <p>En attente de validation</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon green"><i class="fa-solid fa-circle-check"></i></div>
            </div>
            <div class="card-text">
                <p>Approuvé</p>
                <h3>128</h3>
                <p>Demandes Approuvées</p>
            </div>
        </div>
        <div class="card">
            <div class="card-top">
                <div class="icon red"><i class="fa-solid fa-circle-xmark"></i></div>
            </div>
            <div class="card-text">
                <p>Refusé</p>
                <h3>128</h3>
                <p>Demandes réfuées</p>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="table-card">
            <div class="filters">
                <input type="search" placeholder="filter par nom...">
                <select>
                    <option>Tous les status</option>
                </select>
                <select>
                    <option>Tous les départements</option>
                </select>
                <input type="date">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Employé</th>
                        <th>Département</th>
                        <th>Type</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user">
                                <img src="https://i.pravatar.cc/100?img=1">
                                <div>
                                    <h4>Sarah Benali</h4>
                                    <small>RH</small>
                                </div>
                            </div>
                        </td>
                        <td>Marketing</td>
                        <td>Congé annuel</td>
                        <td>20/05/2026</td>
                        <td>25/05/2026</td>
                        <td>
                            <span class="status pending">En attente</span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user">
                                <img src="https://i.pravatar.cc/100?img=5">
                                <div>
                                    <h4>Mohamed Ali</h4>
                                    <small>IT</small>
                                </div>
                            </div>
                        </td>

                        <td>Développement</td>
                        <td>Maladie</td>
                        <td>12/05/2026</td>
                        <td>18/05/2026</td>
                        <td>
                            <span class="status approved">Approuvé</span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
             <div class="pajination">
                <h5>Affichage de 1 à 6 sur 30 absences</h5>
                <div class="button">
                    <button><</button>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>></button>
                </div>
             </div>
        </div>
        <div class="right">
            <div class="calendar">
                <h3>Calendrier des congés</h3>
                <div class="calendar-box">
                    <input type="date">
                </div>
            </div>
            <div class="absent">
                <h3>Employés absents aujourd'hui</h3>
                <div class="absent-user">
                    <img src="" alt="logo">
                    <div>
                        <h4>Sarah Benali</h4>
                        <p>Congé annuel</p>
                    </div>
                </div>
                <div class="absent-user">
                    <img src="" alt="logo">
                    <div>
                        <h4>Mohamed Ali</h4>
                        <p>Maladie</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
</main>