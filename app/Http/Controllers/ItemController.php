<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('tags');

        // 🔍 Search by name
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // 🏷️ Filter by multiple tags
        if ($tagIds = $request->input('tags')) {
            $query->whereHas('tags', function ($q) use ($tagIds) {
                $q->whereIn('tags.id', $tagIds);
            });
        }

        $items = $query->get();
        $tags = \App\Models\Tag::all();

        return view('items.index', compact('items', 'tags'));
    }


    public function create()
    {

        $tags = Tag::all();
        return view('items.create', [
            'tags' => $tags
        ]);
    }


    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string'],
            'tag_id' => ['array'], // now multiple tags allowed
            'tag_id.*' => ['exists:tags,id'],
        ]);

        $item = Item::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // attach tags to the pivot table
        if (!empty($validated['tag_id'])) {
            $item->tags()->attach($validated['tag_id']);
        }

        return redirect()
            ->route('items.index')
            ->with('success', 'Item created successfully!');
    }




    public function edit(Item $item)
    {
//        if (Auth::guest()) {
//            return redirect('/login');
//        }

//        Gate::authorize('edit-item', $item);

        return view('items.edit', ['item' => $item]);
    }


    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string'],
            'tag_id' => ['nullable', 'exists:tags,id'],
        ]);

        $item->update($validated);

        return redirect()
            ->route('items.show', $item)
            ->with('success', 'Item updated successfully!');
    }


    public function destroy(Item $item)
    {
        //   $product = Product::findOrFail($id);
        $item->delete();

        return redirect('/items');
    }}
