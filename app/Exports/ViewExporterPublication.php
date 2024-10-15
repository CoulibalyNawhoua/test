<?php

namespace App\Exports;

use App\Models\Publication;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ViewExporterPublication implements FromView
{
    public function view(): View
    {

        $publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('users.nom, users.prenom, users.telephone, publication.titre, publication.libele, publication.created_at, publication.updated_at')
            ->orderBy('publication.created_at', 'DESC')
            ->get();

        return view('exports.publication', [
            'publications' => $publications
        ]);
    }

}
