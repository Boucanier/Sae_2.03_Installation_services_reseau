<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style_sae.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
        <title>SAÉ 2.03 - Réservation</title>
    </head>

	<body>
        <div class="content">
            <div class="reserv"><div class="reserv_form">
                <h2>Réservation de salle</h2>
                <form Method="POST" Action="conclusion_salles.php">
                    <h3>VOTRE NOM :
                    &emsp;&emsp;<input name="nom" id="nom" size="15" tabindex="1"	type="text" autocomplete="off"></h3>
                    <h3>VOTRE PRENOM :
                    <input name="prenom" id="prenom" size="15" tabindex="1"	type="text" autocomplete="off"></h3>
                    <h3>MOTIF :
                    &emsp;&emsp;&emsp;&emsp;&emsp;<input name="motif" id="motif" size="15" tabindex="1"	type="text" autocomplete="off">	</h3>
                    
                    <br>
                    <div class="choix">
                        <label>DATE : <input type="date" id="date_reserv" name="date_reserv" value="<?php echo date('Y-m-d'); ?>"></label>

                        <br>
                        <label>HORAIRE DE DÉBUT : <select name="hdebut" size="1" id="hdebut">
                            <option value="8"> 8h</option>
                            <option value="9"> 9h</option>
                            <option value="10"> 10h</option>
                            <option value="11"> 11h</option>
                            <option value="12"> 12h</option>
                            <option value="13"> 13h</option>
                            <option value="14"> 14h</option>
                            <option value="15"> 15h</option>
                            <option value="16"> 16h</option>
                            <option value="17"> 17h</option>
                            <option value="18"> 18h</option>
                        </select></label>
                        
                        <br>
                        <label>HORAIRE DE FIN : <select name="hfin" size="1" id="hfin">
                            <option value="8"> 8h</option>
                            <option value="9"> 9h</option>
                            <option value="10"> 10h</option>
                            <option value="11"> 11h</option>
                            <option value="12"> 12h</option>
                            <option value="13"> 13h</option>
                            <option value="14"> 14h</option>
                            <option value="15"> 15h</option>
                            <option value="16"> 16h</option>
                            <option value="17"> 17h</option>
                            <option value="18"> 18h</option>
                        </select></label>

                        <br>
                        <label>SALLE :
                            <label><input name="salle" value="G25" type="radio" checked>G25</input></label>
                            <label><input name="salle" value="G26" type="radio">G26</input></label>
                            <label><input name="salle" value="I21" type="radio">I21</input></label>
                            <label><input name="salle" value="313" type="radio">313</input></label>
                            <label><input name="salle" value="512" type="radio">512</input></label>
                        </label>
                    </div>

                    <br>
                    <br>
                    <input value="Valider" type="submit">
                    <input value="Abandon" type="reset">
                </form>
                <br>
                <button onclick="location.href = '../index.html';">Retour à l'accueil</button>
            </div>

            <div class="tableau">
            <?php
                $serveur = 'localhost';
                $utilisateur = 'client_s203';
                $motdepasse = '2023*Azerty';
                $base_de_donnees = 'S203';

                $conn = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $motdepasse);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $table = 'RESERVATIONS';
                $stmt = "SELECT DATE, HDEBUT, HFIN, SALLE, MOTIF FROM $table WHERE DATE >= CURDATE() ORDER BY DATE, SALLE, HDEBUT";

                $resultat = $conn->query($stmt);

                if ($resultat->rowCount() > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Date</th>";
                    echo "<th>Horaires</th>";
                    echo "<th>Salle</th>";
                    echo "<th>Motif</th>";
                    echo "</tr>";

                    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td class=date>" . $ligne['DATE'] . "</td>";
                        echo "<td class=horaires>" . $ligne['HDEBUT'] . "h - " . $ligne['HFIN'] . "h</td>";
                        echo "<td>" . $ligne['SALLE'] . "</td>";
                        echo "<td class=motif>" . $ligne['MOTIF'] . "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo $_POST['date_reserv'];
            }
                
                $conn = null;
            ?>
            </div>
            </div>
        </div>
        <footer>
            <h5>Jules CHIRON, Matis RODIER, INF1 - A</h5>
        </footer>
	</body>	
</html>
