<?php require_once __DIR__ . "/../partials/navbar.php"?>
<?php require_once __DIR__ . "/../partials/header.php"?>
<main class="min-h-screen ml-6 md:ml-60 mt-16">
    <div class="mx-auto max-w-5xl">
      <div class="contenair">
        <h2>Tableau de bord-absences</h2>
        <div class="Card-Grid">
        <div class="carde">
            <div class="card-haut">
                <div class="icons blue"><i class="fa-solid fa-file"></i></div>
            </div>
            <div class="card-texte">
                <p>Absents aujourd'hui</p>
                <h3>128</h3>
                <p>sur 126 etudiants</p>
            </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons orange"><i class="fa-solid fa-clock"></i></div>
                </div>
                <div class="card-texte">
                    <p>Retards aujourd'hui</p>
                    <h3>128</h3>
                    <p>sur 126 etudiants</p>
                </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons green"><i class="fa-solid fa-circle-check"></i></div>
                </div>
                <div class="card-texte">
                    <p>Absencesjustifiées</p>
                    <h3>128</h3>
                    <p>ce mois</p>
                </div>
            </div>
            <div class="carde">
                <div class="card-haut">
                    <div class="icons move"><i class="fa-solid fa-circle-xmark"></i></div>
                </div>
                <div class="card-texte">
                    <p>Absences non justifiées</p>
                    <h3>128</h3>
                    <p>ce mois</p>
                </div>
            </div>
        </div>
       <!-- ================== les tableaux d'absences ============= -->
        <section class="Card-Flex">
            <div class="mains">
            <div class="Card-Filter">
                <input type="search" placeholder="filtrer par nom ....">
                <select name="" id="">
                    <option>Tous les status</option>
                </select>
                <select name="" id="">
                    <option>Départements</option>
                </select>
                <input type="date">
            </div>
            <div class="table">
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Departement</th>
                        <th>Date</th>
                        <th>Heur</th>
                        <th>Motif</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tr>
                        <td>khadiatou diallo</td>
                        <td>Dev</td>
                        <td>17/05/26</td>
                        <td>08h-14h</td>
                        <td>Rv Important</td>
                        <td>En_cours</td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>khadiatou diallo</td>
                        <td>Dev</td>
                        <td>17/05/26</td>
                        <td>08h-14h</td>
                        <td>Rv Important</td>
                        <td>En_cours</td>
                        <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                    <tr>
                         <td>khadiatou diallo</td>
                         <td>Dev</td>
                         <td>17/05/26</td>
                         <td>08h-14h</td>
                         <td>Rv Important</td>
                         <td>En_cours</td>
                         <td>
                            <div class="actions">
                                <button class="check"><i class="fa-solid fa-check"></i></button>
                                <button class="close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                     </tr>
                 </table>
                 <div class="PAJINATIONS_absences">
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
            </div>
            <!-- ==================right =================== -->
             <div class="RiGht">
                <div class="clandiriers">
                    <input type="date">
                </div>
                <div class="card-absence">
                    <div class="h4">
                        <h4>Absents aujourd'hui</h4>
                        <button>Voir tout</button>
                    </div>
                    <div class="h4">
                        <p>nom:jean cissé</p>
                        <button class="absent">Absent</button>
                    </div>
                    <div class="h4">
                        <p>nom:khadiatou telly diallo</p>
                        <button class="absent">Absent</button>
                    </div>
                </div>
             </div>
        </section>
      </div>
    </div>
</main>
