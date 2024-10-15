<?php

namespace App\Exports;

use App\Models\Publication;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublicationExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('users.nom, users.prenom, users.telephone, publication.titre, publication.libele, publication.created_at, publication.updated_at')
            ->orderBy('publication.created_at', 'DESC')
            ->get();

        // Formater les dates avant de les retourner
        foreach ($publications as $publication) {

            $publication->created_at = Carbon::parse($publication->date)->format('LLLL');
            $publication->updated_at = Carbon::parse($publication->date)->format('LLLL');
        }

        return $publications;
    }

}
