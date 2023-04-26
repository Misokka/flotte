<!DOCTYPE html>
<html>
<head>
    <title>Nouveau compte utilisateur créé</title>
</head>
<body>
    <p>Bonjour {{ $data->firstname }} {{ $data->lastname }},</p>
    <p>Votre compte utilisateur a été créé avec succès.</p>
    <p>Voici vos informations de connexion :</p>
    <ul>
        <li>Adresse e-mail : {{ $data->email }}</li>
        <li>Mot de passe : {{ $data->password }}</li>
    </ul>
    <p>Nous vous recommandons de changer votre mot de passe après la première connexion.</p>
</body>
</html>
