<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('tags')->latest()->paginate(5);
        return view('items.index', [
            'items' =>  $items
        ]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function show(Item $item)
    {
        return view('item.show', ['item' => $item]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required'],
            'user_id' => ''
        ]);


        Item::create([
            'name' => request('name'),
            'description' => request('description'),
            'user_id' => 1
        ]);

        return redirect('/items');
    }


    public function edit(Item $item)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        Gate::authorize('edit-item', $item);

        return view('item.edit', ['item' => $item]);
    }


    public function update(Item $item)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required'],
            'user_id' => ''
        ]);

//    $item = Product::findOrFail($id);

        $item->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/item/' . $item->id);
    }

    public function destroy(Item $item)
    {
        //   $product = Product::findOrFail($id);
        $item->delete();

        return redirect('/items');
    }}
