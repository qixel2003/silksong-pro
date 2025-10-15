<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $items = Item::with('tags')->latest()->paginate(5);
        return view('items.index', [
            'items' =>  $items,
            'tags' => $tags
        ]);
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
            'tag_id' => ['exists:tags,id'],
        ]);

        Item::create($validated);

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
