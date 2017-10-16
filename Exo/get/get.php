<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Récupérer des donnes passées en paramètre das une url, via la superglobale $_GET</h1>
<a href="get-read.php">Que est la?</a>
<h2>A propos de vous</h2>
<form action="get-read.php" method="get">
    <p>
        <label for="age">Vote âge</label>
        <input type="text" name="age" id="age">
    </p>
    <p>
        <label for="name">Votre Prénom</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="statut">Votre Statut professionel</label>
        <select name="statut" id="statut">
            <option value="">Sélectionner un Statut </option>
            <option value="chomage">En recherche d'emploi</option>
            <option value="salarie">Salarié(e)</option>
            <option value="etudiant">Etudiant(e)</option>
            <option value="pdg">Chef d'entreprise</option>
        </select>
    </p>
    <p>
        <input type="submit" value="Valider">
    </p>
</form>
</body>
</html>

