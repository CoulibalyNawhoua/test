<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom(s)</th>
        <th>Téléphone</th>
        <th>Titre</th>
        <th>Libellé</th>
        <th>Date publication</th>



    </tr>
    </thead>
    <tbody>
    @foreach($publications as $publication)
        <tr>
            <td>{{ $publication->nom }}</td>
            <td>{{ $publication->prenom }}</td>
            <td>{{ $publication->telephone }}</td>
            <td>{{ $publication->titre }}</td>
            <td>{{ $publication->libele }}</td>
            <td>{{ $publication->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
