<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class BookApiController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Filter by category
        if ($request->filled('categorie') && $request->categorie !== 'Tous') {
            $query->where('categorie', $request->categorie);
        }

        // Filter by type
        $types = ['Roman', 'Nouvelle', 'Essai', 'Biographie', 'Manuel_scolaire', 'Livre_de_reference', 'Livre_jeunesse', 'Bande_dessinee'];
        $selectedTypes = array_filter($types, fn($type) => $request->has($type));
        if (!empty($selectedTypes)) {
            $query->whereIn('type', $selectedTypes);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('prix', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('prix', '<=', $request->max_price);
        }

        // Sort by specified criteria
        if ($request->filled('sort_by')) {
            $sortBy = $request->sort_by;
            if (in_array($sortBy, ['prix', 'titre', 'auteur'])) {
                $query->orderBy($sortBy);
            }
        }

        $books = $query->paginate(6); // Adjust pagination as needed

        return response()->json($books);
    }

    /**
     * Store a newly created book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/book'), $filename);
            $book->cover = $filename;
        }

        $book->type = $request->type;
        $book->categorie = $request->categorie;
        $book->langue = $request->langue;
        $book->editeur = $request->editeur;
        $book->designation = $request->designation;
        $book->auteur = $request->auteur;
        $book->description = $request->description;
        $book->prix = $request->prix;
        $book->save();

        Log::info('New book added with ID: ' . $book->id);

        return response()->json($book, Response::HTTP_CREATED);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book);
    }

    /**
     * Update the specified book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        if ($request->hasFile('cover')) {
            if ($book->cover != 'book.png' && $book->cover != null) {
                $oldCoverPath = public_path('assets/img/book/' . $book->cover);
                if (file_exists($oldCoverPath)) {
                    unlink($oldCoverPath);
                }
            }
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/book'), $filename);
            $book->cover = $filename;
        }

        $book->type = $request->type;
        $book->categorie = $request->categorie;
        $book->langue = $request->langue;
        $book->editeur = $request->editeur;
        $book->designation = $request->designation;
        $book->auteur = $request->auteur;
        $book->description = $request->description;
        $book->prix = $request->prix;
        $book->save();

        Log::info('Book updated with ID: ' . $book->id);

        return response()->json($book);
    }

    /**
     * Soft delete the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete(); // Soft delete

        return response()->json(['message' => 'Book deleted successfully.']);
    }

    /**
     * Restore a soft-deleted book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore(); // Restore the book

        return response()->json(['message' => 'Book restored successfully.']);
    }

    /**
     * Force delete a soft-deleted book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete(); // Permanently delete the book

        return response()->json(['message' => 'Book permanently deleted.']);
    }
}
