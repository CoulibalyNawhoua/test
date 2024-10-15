<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\User;
use App\Models\Rating;
use App\Models\Publication;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\PublicationExport;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ViewExporterPublication;

class PublicationController extends Controller
{

    public function index_publication()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté


        $publications = Publication::where([
            ['add_by', '=', $user->id],
            ['is_deleted', '=', 0]
        ])->get(); // Récupérer les publications de l'utilisateur

        return view('admin.posts.liste', compact('publications'));
    }

    public function create_pub()
    {
        return view('admin.posts.create');
    }


    public function pub_store(Request $request)
    {
        $validated = $request->validate([

            'titre' => 'required',
            'libele' => 'required',
            'description' => 'required',

        ]);

        $user_id = Auth::user()->id;

        $input = $request->all();

        $input['add_by'] = $user_id;

        Publication::create($input);

        return redirect()->back()->with('success', 'Enregistrement effectué avec succès!');
    }


    public function pub_show($id)
    {
        $publication = Publication::find($id);
        return view('admin.posts.show', compact('publication'));
    }

    public function pub_edit($id)
    {
        $publication = Publication::find($id);
        return view('admin.posts.edit', compact('publication'));
    }


    public function pub_update(Request $request, string $id)
    {

        $publication = Publication::find($id);

        $user_id = Auth::user()->id;

        $input = $request->all();

        $input['edit_by'] = $user_id;

        $publication->update($input);

        return redirect()->back()->with('success', 'Modification effectuée avec succès');
    }


    public function pub_delete(string $id)
    {
        $user_id = Auth::user()->id;
        $publication = Publication::find($id);
        $publication->is_deleted = 1;
        $publication->deleted_by = $user_id;
        $publication->save();

        return redirect()->back()->with('success', 'Publication supprimé avec  succès');
    }

    public function publish_post(Request $request)
    {

        $publication = Publication::find($request->id);
        
        $publication->update(['status' => 1]);


        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new InvoicePaid($publication));
        }

        return response()->json('ok');
    }
        // return redirect()->back()->with('success', 'Modification effectuée avec succès');


    public function all_publication()
    {

        $publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('publication.titre, publication.libele, publication.created_at, publication.status, publication.id,publication.updated_at, users.nom, users.prenom, users.telephone, users.photo')
            ->orderBy('publication.created_at', 'DESC')
            ->get();

        return view('admin.posts.liste_poste', compact('publications'));
    }

    public function show_post($id)
    {
        $publication = Publication::where('publication.id', $id)
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('publication.titre, publication.libele, publication.created_at, publication.status, publication.id,publication.description,publication.updated_at, users.nom, users.prenom, users.telephone')
            ->firstOrFail();

        //    dd($publication);

        return view('admin.posts.details_post', compact('publication'));

    }

    public function export_publication()
    {
        return Excel::download(new ViewExporterPublication, 'publication.xlsx');
    }

    // Generate PDF
    public function generatePDF()
    {
        // retreive all records from db
        $publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('users.nom, users.prenom, users.telephone, publication.titre, publication.libele, publication.created_at, publication.updated_at')
            ->orderBy('publication.created_at', 'DESC')
            ->get();

        $pdf = PDF::loadView('exports.pdf.publication', ['publications' => $publications]);
        return $pdf->download('publicationpdf.pdf');

        // return view('publication.pdf',compact('publications'));
    }

    public function store_rating(Request $request)
    {
        $user_id = Auth::user()->id;
        $pub_id = $request->input('pub_id');
        $rating = $request->input('product_rating');

        Rating::create([

            'user_id' => Auth::user()->id,
            'pub_id' => $pub_id,
            'note' => $rating,

        ]);
        return redirect()->back()->with('success', 'Merci pour la note,');
    }


}
