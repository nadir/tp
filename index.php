<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Document</title>
</head>

<body>

<div class="main">
    <div class="controls">
        <form action="index.php" method="get">
            <label for="recherche" hidden>Rechercher un etudiant</label>
            <input placeholder="Entrer un nom" id="recherche" type="search" name="search">
            <button type="submit" id="modify">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Search</title>
                    <path d="M464 428L339.92 303.9a160.48 160.48 0 0030.72-94.58C370.64 120.37 298.27 48 209.32 48S48 120.37 48 209.32s72.37 161.32 161.32 161.32a160.48 160.48 0 0094.58-30.72L428 464zM209.32 319.69a110.38 110.38 0 11110.37-110.37 110.5 110.5 0 01-110.37 110.37z"/>
                </svg>
                <span>Rechercher</span>
            </button>
        </form>
        <a href="add.php" id="modify">

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Person Add</title>
                <path d="M106 304v-54h54v-36h-54v-54H70v54H16v36h54v54h36z"/>
                <circle cx="288" cy="144" r="112"/>
                <path d="M288 288c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128z"/>
            </svg>
            <span>Ajouter</span>
        </a>
    </div>
    <table class="etudiants">
        <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Section</th>
            <th>Groupe</th>
            <th>Examen</th>
            <th>TD</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
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

        if (isset($_GET['search'])) {
            $sql = "SELECT * FROM etudiants WHERE CONCAT(Nom, ' ', Prenom) LIKE '%" . $_GET['search'] . "%'";
        } else {
            $sql = "SELECT * from etudiants";
        }
        $result = $conn->query($sql);

        ?>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <?php echo "<td>" . $row["Matricule"] . "</td>" ?>
                    <?php echo "<td>" . $row["Nom"] . "</td>" ?>
                    <?php echo "<td>" . $row["Prenom"] . "</td>" ?>
                    <?php echo "<td>" . $row["Date_de_naissance"] . "</td>" ?>
                    <?php echo "<td>" . $row["Section"] . "</td>" ?>
                    <?php echo "<td>" . $row["Groupe"] . "</td>" ?>
                    <?php echo "<td>" . $row["Note_Examen"] . "</td>" ?>
                    <?php echo "<td>" . $row["Note_TD"] . "</td>" ?>
                    <td>
                        <div class="actions">
                            <a href="<?php echo "modify.php?matricule=" . $row['Matricule'] . " " ?>" id="modify">Modifier</a>
                            <form method="post" action="suprimmer.php">
                                <?php echo "<button id='delete' type='submit' name='etudiant' value=" . $row["Matricule"] . ">Suprimmer</button>" ?>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php $conn->close(); ?>
        </tbody>
    </table>
</div>
</body>

</html>