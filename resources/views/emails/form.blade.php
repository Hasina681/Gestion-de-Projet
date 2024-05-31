<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Envoye Email</h1>

    <form action="{{route('send.emails')}}" method="POST">
        @csrf
        <div>
            <label for="">Nom du projet</label>
            <input type="text" name="nomProjet" id="nomProjet" required>
        </div>
        <div>
            <label for="">Reférence du projet</label>
            <input type="text" name="refProjet">
        </div>
        <div>
            <label for="">Déscription</label>
            <textarea name="description" id="" cols="30" rows="10" required></textarea>
        </div>
        <button type="submit" >Envoyer</button>

    </form>
</body>
</html>