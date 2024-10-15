<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('publication.titre, publication.libele, publication.created_at, publication.status, publication.id,publication.updated_at,publication.description, users.nom, users.prenom, users.telephone, users.photo, users.email')
            ->orderBy('publication.created_at', 'DESC')
            ->get();

        return view('dashboard', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function show_post(Request $request, string $id)
    {
        $all_publications = Publication::where([
            ['publication.is_deleted', '=', 0],
            ['publication.status', '=', 1],

        ])
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('publication.titre, publication.libele, publication.created_at, publication.status, publication.id,publication.updated_at,publication.description, users.nom, users.prenom, users.telephone, users.photo, users.email')
            ->orderBy('publication.created_at', 'DESC')
            ->get();
        // $all_publications = Publication::all();

        $publication_details = Publication::where('publication.id', $id)
            ->leftJoin('users', 'users.id', '=', 'publication.add_by')
            ->selectRaw('publication.titre, publication.libele, publication.created_at, publication.status, publication.id, publication.description,publication.updated_at, users.nom, users.prenom, users.telephone, users.photo, users.email')
            ->orderBy('publication.created_at', 'DESC')
            ->firstOrFail();

        $ratings = Rating::where([
            ['pub_id', '=', $publication_details->id],
        ])->avg('note');


        return view('pages.details_pub', compact('all_publications', 'publication_details','ratings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_rating(Request $request)
    {
        $user_id = Auth::user()->id;
        $pub_id = $request->input('pub_id');
        $rating = $request->input('product_rating');

        $rating_existe = Rating::where([

            ['user_id', '=', $user_id],
            ['pub_id', '=', $pub_id]

        ])->first();

        if ($rating_existe) {

            $rating_existe->rating = $rating;
            // $rating_existe->update();

        } else {
            Rating::create([

                'user_id' => Auth::user()->id,
                'pub_id' => $pub_id,
                'note' => $rating,

            ]);

        }
        return redirect()->back()->with('success', 'Merci pour la note,');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
