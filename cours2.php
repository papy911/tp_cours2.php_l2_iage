<?php
$fichier = "personne.json";

if (!file_exists($fichier)) {
    file_put_contents($fichier, json_encode([]));
}

$tabpersonnes = json_decode(file_get_contents($fichier), true);

if (!is_array($tabpersonnes)) {
    $tabpersonnes = [];
}

if (isset($_POST["enreg"])) {

    $pers = [
        "prenom" => htmlspecialchars($_POST["prenom"]),
        "nom" => htmlspecialchars($_POST["nom"]),
        "adresse" => htmlspecialchars($_POST["adr"]),
        "telephone" => htmlspecialchars($_POST["tel"])
    ];

    $tabpersonnes[] = $pers;

    file_put_contents($fichier, json_encode($tabpersonnes, JSON_PRETTY_PRINT));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 Form & Table</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<h1 class="text-center text-primary">TP Form & Table</h1>

<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <form method="post">
                    <div class="card-header">Ajout Personne</div>
                    <div class="card-body">

                        <label>Prénom</label>
                        <input class="form-control" type="text" name="prenom" required>

                        <label class="mt-2">Nom</label>
                        <input class="form-control" type="text" name="nom" required>

                        <label class="mt-2">Adresse</label>
                        <input class="form-control" type="text" name="adr" required>

                        <label class="mt-2">Téléphone</label>
                        <input class="form-control" type="text" name="tel" required>

                        <button class="btn btn-primary mt-3" name="enreg">Enregistrer</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des personnes</div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                        </tr>

                        <?php
                        $i = 1;
                        foreach ($tabpersonnes as $p) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>{$p['prenom']}</td>";
                            echo "<td>{$p['nom']}</td>";
                            echo "<td>{$p['adresse']}</td>";
                            echo "<td>{$p['telephone']}</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
