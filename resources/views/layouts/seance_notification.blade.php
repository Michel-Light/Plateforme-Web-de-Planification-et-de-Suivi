<!-- resources/views/emails/participant_added.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Notification de Séance</title>
</head>
<body>
    <h1>Bonjour,</h1>
    <p>Vous avez été ajouté à la séance suivante :</p>
    <p><strong>Titre :</strong> {{ $seance->Titre }}</p>
    <p><strong>Date :</strong> {{ $seance->Date }}</p>
    <p><strong>Heure de début :</strong> {{ $seance->Heure_debut }}</p>
    <p><strong>Heure de fin :</strong> {{ $seance->Heure_fin }}</p>
    <p><strong>Lieu :</strong> {{ $seance->Lieu }}</p>
    <p>Merci de vérifier vos disponibilités et de vous préparer pour cette séance.</p>
</body>
</html>
