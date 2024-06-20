<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Modules</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.css">

</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Modules</h2>
        <a class="btn btn-primary mb-4" href="{{ route('modules.create') }}">Ajouter un Module</a>


        <table class="table table-bordered table-custom">
            <thead class="thead-dark">
                <tr>

                    <th>Nom</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Dernier statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->type }}</td>
                        <td>{{ $module->description }}</td>
                        <td>
                            @if(count($module->histories)>0 && $module->histories->last()->status == 0)
                                <span class="badge badge-danger">En Panne</span>
                            @else
                                <span class="badge badge-success">En Fonction</span>
                            @endif
                        </td>
                        <td class="btn-group-custom">
                            <a href="{{ route('modules.data', $module->id) }}" class="btn btn-info btn-sm">Afficher</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>




</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        // Configurer Pusher
        Pusher.logToConsole = true;

        var pusher = new Pusher('546646e4307c507c4494', {
            cluster: 'eu',
            forceTLS: true
        });
        console.log('{{ env("PUSHER_APP_KEY") }} ')
        console.log(pusher.key)
        var channel = pusher.subscribe('module-status');
        channel.bind('pusher:subscription_succeeded', function(members) {
            console.log("successfully subscribed!")
        });
        channel.bind('App\\Events\\ModuleStatusChanged', function(data) {
            console.log("in eventtttt")
            console.log(data.module)
            if( count(data.module.histories)>0 && data.module.histories.last().status == 0) {
                $.notify(`Le module ${data.module.name} est en panne!`, "error");
            } else {
                $.notify(`Le module ${data.module.name} est de retour en fonctionnement!`, "success");
            }
        });
    </script>
</html>
