<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Module</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un Module</h2>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom du Module</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="type">Type de Module</label>
                <select name="type" required>
                    <option value="Température">Température</option>
                    <option value="Vitesse">Vitesse</option>
                    <option value="Autre">Autre</option>
                </select>
{{--                 <input type="text" class="form-control" id="type" name="type" required>
 --}}            </div>
            <div class="form-group">
                <label for="description">Description du Module</label>
                <input type="text" class="form-control" id="status" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>
