<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Message de contact</title>
</head>
<body>
    <h2>Vous avez reçu un nouveau message via votre portfolio</h2>
    <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
