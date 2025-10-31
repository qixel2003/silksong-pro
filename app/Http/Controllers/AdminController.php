<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Build;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Search + filter
        $search = $request->input('search');
        $statusFilter = $request->input('status');

        $users = User::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($statusFilter !== null, fn($q) => $q->where('status', $statusFilter))
            ->with('builds')
            ->orderBy('name')
            ->paginate(10);

        $builds = Build::query()
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->when($statusFilter !== null, fn($q) => $q->where('status', $statusFilter))
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('admin.index', compact('users', 'builds', 'search', 'statusFilter'));
    }

    public function toggleUser(User $user)
    {
        $user->status = !$user->status;
        $user->save();

        // Cascade: turn their builds on/off
        $user->builds()->update(['status' => $user->status]);

        return back()->with('success', "User '{$user->name}' and their builds have been updated.");
    }

    public function toggleBuild(Build $build)
    {
        $build->status = !$build->status;
        $build->save();

        return back()->with('success', "Build '{$build->title}' status updated.");
    }
}
