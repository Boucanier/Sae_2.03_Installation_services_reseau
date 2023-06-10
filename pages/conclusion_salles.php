<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8">
        <title>SAÉ 2.03 - Récapitulatif</title>
		<link rel="stylesheet" type="text/css" href="../css/style_sae.css" />
        <link rel="icon" type="image/png" href="../images/logo.png" />
    </head>

    <body>
        <div class="content">
            <div class = "recap_full">
                <h2>Réservation de salle</h2>
                <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $prenom = $_POST['prenom'];
                    $nom = $_POST['nom'];
                    $motif = $_POST['motif'];
                    $date_reserv = $_POST['date_reserv'];
                    $hdebut = $_POST['hdebut'];
                    $hfin = $_POST['hfin'];
                    $salle = $_POST['salle'];
                    echo "<div class=recap>Vous avez réservé une salle au nom de $prenom $nom"."<br>\n";
                    echo "Motif de la réservation : $motif"."<br>\n";
                    echo "Le $date_reserv"."<br>\n";
                    echo "Salle $salle de $hdebut"."h à $hfin"."h</div>";

                    $serveur = '127.0.0.1';
                    $utilisateur = 'CLIENT_S203';
                    $motdepasse = '2023*Azerty';
                    $base_de_donnees = 'S203';

                    try {
                        $conn = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $motdepasse);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Requête d'insertion
                        $stmt = $conn->prepare("INSERT INTO RESERVATIONS (SALLE, DATE, HDEBUT, HFIN, PRENOM, NOM, MOTIF) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$salle, $date_reserv, $hdebut, $hfin, $prenom, $nom, $motif]);

                        echo "<div class=good_insert>Réservation validée</div>";
                    } catch (PDOException $e) {
                        if ($e->getCode() == '45000') {
                            // Gestion de l'exception générée par le trigger
                            echo "<div class=bad_insert>Erreur : " . $e->getMessage()."<br>Votre réservation n'a pas pû être validée</div>";
                        } else {
                            // Gestion d'autres exceptions
                            echo "<div class=bad_insert>Erreur lors de l'insertion : " . $e->getMessage()."<br>Votre réservation n'a pas pû être validée</div>";
                        }
                    }
                ?>
                <br>
                <button onclick="location.href = '../index.html';">Retour à l'accueil</button>
                <button onclick="location.href = 'reserv_salles.php';">Nouvelle réservation</button>
            </div>
        </div>
        <footer>
            <h5>Jules CHIRON, Matis RODIER, INF1 - A</h5>
        </footer>
    </body>
</html>
