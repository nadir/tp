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
                    <label for="id">Matricule:</label>
                    <input type="number" name="matricule" id="id">
                </li>
                <li>
                    <label for="firstname">Nom:</label>
                    <input type="text" name="name" id="firstname">
                </li>
                <li>
                    <label for="lastname">Prénom:</label>
                    <input type="text" name="lastname" id="lastname">
                </li>
                <li>
                    <label for="date">Date de naissance:</label>
                    <input type="date" name="date" id="date">
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
                    <input type="number" name="matricule" id="examen">
                </li>
                <li>
                    <label for="examen">Note TD:</label>
                    <input type="number" name="examen" id="examen">
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