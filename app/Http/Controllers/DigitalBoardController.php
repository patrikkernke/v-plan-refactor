<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Response;

class DigitalBoardController extends Controller
{
    public function index()
    {
        return Inertia::render('DigitalBoard/Public', [
            'documents' => (Document::all())->groupBy('category')
        ]);
    }

    public function edit()
    {
        Gate::authorize('manage-digital-board');

        return Inertia::render('DigitalBoard/Edit', [
            'documents' => (Document::all())->groupBy('category')
        ]);
    }

    public function store()
    {
        Gate::authorize('manage-digital-board');

        request()->validate([
            'label' => ['required'],
            'document' => ['required', 'file', 'mimes:pdf', 'max:10240'],
            'category' => ['required'],
        ]);

        Document::create([
            'label' => request('label'),
            'file' => request()->file('document')->store('digital-board'),
            'category' => request('category')
        ]);


        return redirect()->route('digital-board.edit');
    }

    public function destroy(Document $document)
    {
        Gate::authorize('manage-digital-board');

        $document->delete();

        return redirect()->route('digital-board.edit');
    }

    public function download(Document $document)
    {
        return Storage::download(
            $document->file,
            "$document->label.pdf"
        );
    }
}
