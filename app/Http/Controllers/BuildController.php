<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BuildController extends Controller
{
    /**
     * Display a listing of builds.
     */
    public function index()
    {
        $builds = Build::with(['items', 'user'])
            ->where('status', true)
            ->latest()
            ->paginate(5);

        return view('builds.index', [
            'builds' => $builds,
        ]);
    }

    /**
     * Show the form for creating a new build.
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        $items = Item::all();

        return view('builds.create', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created build in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'item_id' => ['array'],
            'item_id.*' => ['exists:items,id'],
            'status' => ['boolean'],
        ]);

        $build = Build::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'] ?? true,
            'user_id' => Auth::id(),
            'item_list' => !empty($validated['item_id']) ? json_encode($validated['item_id']) : null,
        ]);

        if (!empty($validated['item_id'])) {
            $build->items()->attach($validated['item_id']);
        }

        return redirect()
            ->route('builds.index')
            ->with('success', 'Build created successfully!');
    }

    /**
     * Show the form for editing the specified build.
     */
    public function edit(Build $build)
    {


        $this->authorize('edit', $build);

        $items = Item::all();

        return view('builds.edit', [
            'build' => $build,
            'items' => $items,
        ]);
    }


    /**
     * Display the specified build.
     */
    public function show(Build $build)
    {
        $build->load(['items', 'user']);

        return view('builds.show', ['build' => $build]);
    }

    /**
     * Update the specified build in storage.
     */
    public function update(Request $request, Build $build)
    {
        $this->authorize('update', $build);


        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'item_id' => ['array'],
            'item_id.*' => ['exists:items,id'],
            'status' => ['boolean'],
        ]);

        $build->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'] ?? $build->status,
        ]);

        // Sync updated items (remove old ones, attach new)
        $build->items()->sync($validated['item_id'] ?? []);

        return redirect()
            ->route('builds.show', $build)
            ->with('success', 'Build updated successfully!');
    }

    /**
     * Remove the specified build from storage.
     */
    public function destroy(Build $build)
    {
        $this->authorize('destroy', $build);

        $build->delete();

        return redirect()
            ->route('builds.index')
            ->with('success', 'Build deleted successfully!');
    }
}
