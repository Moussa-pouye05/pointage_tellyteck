<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>

<main class="min-h-screen ml-6 md:ml-60 mt-16 ">


<div class="stats-container">

    <div class="stat-card">
        <div class="stat-icon orange"><i class="fa-solid fa-users-between-lines"></i></div>
        <div class="stat-content">
            <p>Total Étudiants</p>
            <h3>125</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon meuve"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-content">
            <p>Étudiants Actifs</p>
            <h3>12</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon red"><i class="fa-solid fa-graduation-cap"></i></div>
        <div class="stat-content">
            <p>Départements</p>
            <h3>5</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green"><i class="fa-solid fa-school"></i></div>
        <div class="stat-content">
            <p>Présences Aujourd'hui</p>
            <h3>30</h3>
        </div>
    </div>

</div>


<div class="table-card">

    <div class="table-header">

        <div class="filters">

            <input type="text" placeholder="🔍 Rechercher un étudiant">

            <select>
                <option>Département</option>
                <option>Informatique</option>
                <option>Gestion</option>
            </select>


            <!-- Bouton -->
<button id="openModal" class="btn-ajout">+Ajouter_Etudiant</button>

<!-- Popup -->
<div id="studentModal" class="modal">

    <div class="modal-content">

        <!-- Bouton fermer -->
        <span class="close">&times;</span>


        <form action="" method="POST" enctype="multipart/form-data">
            <h1>+Ajouter_Etudiant</h1>
            <hr>
            <br>
            <!-- Nom -->
            <div class="form-group">
                <input type="text" name="nom" placeholder="Nom complet" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <input type="text" name="telephone" placeholder="Télephone" required>
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <input type="password" name="password" placeholder="Mot de passe " required>
            </div>

            <!-- Département -->
            <div class="form-group">
                <input type="text" name="department" placeholder="Département" required>
            </div>

            <!-- Photo -->
            <div class="form-group">
                <input type="file" name="profil" accept="image/*" placeholder="Ajouter une photo de profil">
            </div>

            <!-- Bouton -->
            <button type="submit" class="btn-submit">Ajouter</button>

        </form>

    </div>

</div>

        </div>


    </div>



    <table class="student-table">

        <thead>

            <tr>
                <th>Étudiant</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Département</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        <tr>

    <td data-label="Étudiant" class="student-info">
        <span><img src="" alt=""></span>
        <div>
            <h4>Moussa</h4>
            <span>1</span>
        </div>
    </td>

    <td data-label="Email">moussa@gmail.com</td>

    <td data-label="Téléphone">123456700</td>

    <td data-label="Département">
        <span class="department">developpeur(se) web</span>
    </td>

    <td data-label="Statut">
        <span class="badge active">Actif</span>
    </td>

    <td data-label="Actions">
        <button class="action-btn modifier">Modifier</button>
        <button class="action-btn supprimer">Supprimer</button>
    </td>

</tr>

            
<tr>

    <td data-label="Étudiant" class="student-info">
        <span><img src="" alt=""></span>
        <div>
            <h4>Yaya</h4>
            <span>2</span>
        </div>
    </td>

    <td data-label="Email">yaya@gmail.com</td>

    <td data-label="Téléphone">123456700</td>

    <td data-label="Département">
        <span class="department">developpeur(se) web</span>
    </td>

    <td data-label="Statut">
        <span class="badge active">Actif</span>
    </td>

    <td data-label="Actions">
        <button class="action-btn modifier">Modifier</button>
        <button class="action-btn supprimer">Supprimer</button>
    </td>

</tr>

<tr>

    <td data-label="Étudiant" class="student-info">
        <span><img src="" alt=""></span>
        <div>
            <h4>Adama</h4>
            <span>3</span>
        </div>
    </td>

    <td data-label="Email">adama@gmail.com</td>

    <td data-label="Téléphone">123456700</td>

    <td data-label="Département">
        <span class="department">developpeur(se) web</span>
    </td>

    <td data-label="Statut">
        <span class="badge Inactive">Inactive</span>
    </td>

    <td data-label="Actions">
        <button class="action-btn modifier">Modifier</button>
        <button class="action-btn supprimer">Supprimer</button>
    </td>

</tr>
        </tbody>

    </table>


    <div class="pagination">

        <button>❮</button>

        <button class="active-page">1</button>
        <button>2</button>
        <button>3</button>

        <button>❯</button>

    </div>

</div>


<script>

const modal = document.getElementById("studentModal");

const openBtn = document.getElementById("openModal");

const closeBtn = document.querySelector(".close");

/* Ouvrir popup */
openBtn.onclick = function(){
    modal.style.display = "block";
}

/* Fermer popup */
closeBtn.onclick = function(){
    modal.style.display = "none";
}

/* Fermer si on clique dehors */
window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
}

</script>
</main>

