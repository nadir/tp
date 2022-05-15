<?php

if (!isset($_GET['matricule'])) {
    header("Location: index.php");
}

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

if (isset($_POST['matricule'])) {
    $matricule = intval($_POST['matricule']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $examen = intval($_POST['examen']);
    $td = intval($_POST['td']);
    $date_naissance = date("Y-m-d", strtotime($_POST['date_naissance']));
    $groupe = intval($_POST['groupe']);
    $section = $_POST['section'];


    $sql = $conn->prepare("UPDATE etudiants SET 
                     Matricule = ?, 
                     Nom = ?, 
                     Prenom = ?, 
                     Date_de_naissance = ?, 
                     Section = ?, 
                     Groupe = ?, 
                     Note_Examen = ?, 
                     Note_TD = ? 
                 WHERE Matricule = ?");
    $fuck = $sql->bind_param("issssiiii", $matricule, $nom, $prenom, $date_naissance, $section, $groupe, $examen, $td, $matricule);
    if (!$fuck) {
        die("fuck you dude");
    }
    if ($sql->execute()) {
        header("Location: index.php");
    }
}


$sql = "SELECT * FROM etudiants WHERE Matricule = " . $_GET['matricule'] . " ";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur d'execution de commande sql");
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
    <?php if ($result->num_rows > 0): ?>
        <?php ($row = $result->fetch_assoc()) ?>

        <div class="form">
            <form action="modify.php" method="post">
                <ul>
                    <li>
                        <label for="matricule">Matricule:</label>
                        <input type="number" value="<?php echo $row['Matricule'] ?>" name="matricule"
                               id="matricule">
                    </li>
                    <li>
                        <label for="nom">Nom:</label>
                        <input type="text" name="nom" id="nom" value="<?php echo $row['Nom'] ?>">
                    </li>
                    <li>
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" id="prenom" value="<?php echo $row['Prenom'] ?>">
                    </li>
                    <li>
                        <label for="date_naissance">Date de naissance:</label>
                        <input type="date" name="date_naissance" id="date_naissance"
                               value="<?php echo date('Y-m-d', strtotime($row["Date_de_naissance"])) ?>">
                    </li>
                    <li>
                        <label for="section">Section:</label>
                        <select name="section" id="section">
                            <option <?php echo ($row['Section'] == "A") ? "selected" : ""; ?> value="A">A</option>
                            <option <?php echo ($row['Section'] == "B") ? "selected" : ""; ?> value="B">B</option>
                        </select>
                    </li>
                    <li>
                        <label for="groupe">Groupe:</label>
                        <select name="groupe" id="groupe">
                            <?php for ($i = 1; $i < 7; $i++) {
                                $selected = $row['Groupe'] == $i ? "selected" : "";
                                echo "<option value='$i' $selected>$i</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="examen">Note Examen:</label>
                        <input type="number" name="examen" id="examen" value="<?php echo $row['Note_Examen'] ?>">
                    </li>
                    <li>
                        <label for="td">Note TD:</label>
                        <input type="number" name="td" id="td" value="<?php echo $row['Note_TD'] ?>">
                    </li>
                    <li>
                        <button id="modify" type="submit">Ajouter</button>
                    </li>
                </ul>
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>