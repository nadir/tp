<?php
if (isset($_POST['matricule'])) {
    $matricule = intval($_POST['matricule']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $examen = intval($_POST['examen']);
    $td = intval($_POST['td']);
    $date_naissance = date("Y-m-d", strtotime($_POST['date_naissance']));
    $groupe = intval($_POST['groupe']);
    $section = $_POST['section'];

    $servername = "localhost";
    $username = "test";
    $password = "bruh";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $conn->prepare("INSERT INTO etudiants VALUES (?,?,?,?,?,?,?,?)");
    $sql->bind_param("issssiii", $matricule, $nom, $prenom, $date_naissance, $section, $groupe, $examen, $td);
    if ($sql->execute()) {
        header("Location: index.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/index.css">
    <title>Document</title>
</head>
<body>
<div class="main">
    <div class="form">
        <form action="add.php" method="post">
            <ul>
                <li>
                    <label for="matricule">Matricule:</label>
                    <input type="number" name="matricule" id="matricule" required>
                </li>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" required>
                </li>
                <li>
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" id="prenom" required>
                </li>
                <li>
                    <label for="date_naissance">Date de naissance:</label>
                    <input type="date" name="date_naissance" id="date_naissance" required>
                </li>
                <li>
                    <label for="section">Section:</label>
                    <select name="section" id="section">
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </li>
                <li>
                    <label for="groupe">Groupe:</label>
                    <select name="groupe" id="groupe">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </li>
                <li>
                    <label for="examen">Note Examen:</label>
                    <input type="number" name="examen" id="examen" required>
                </li>
                <li>
                    <label for="td">Note TD:</label>
                    <input type="number" name="td" id="td" required>
                </li>
                <li>
                    <button id="modify" type="submit">Ajouter</button>
                </li>
            </ul>
        </form>
    </div>
</div>
</body>
</html>