<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    /**
     * Tampilkan daftar bookmark milik user.
     */
    public function index()
    {
        $user = auth()->user();

        $bookmarks = $user->bookmarks()
            ->with('classroom')
            ->orderBy('bookmarks.created_at', 'desc')
            ->get();

        return view('auth.bookmarks', compact('bookmarks'));
    }

    /**
     * Toggle bookmark (simpan/hapus) untuk materi tertentu.
     */
    public function toggle(Request $request, $materialId)
    {
        $user = auth()->user();
        $material = Material::findOrFail($materialId);

        $exists = DB::table('bookmarks')
            ->where('user_id', $user->id)
            ->where('material_id', $material->id)
            ->exists();

        if ($exists) {
            DB::table('bookmarks')
                ->where('user_id', $user->id)
                ->where('material_id', $material->id)
                ->delete();

            return redirect()->back()->with('success', 'Bookmark dihapus.');
        } else {
            DB::table('bookmarks')->insert([
                'user_id' => $user->id,
                'material_id' => $material->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Materi berhasil di-bookmark!');
        }
    }

    /**
     * Hapus bookmark tertentu.
     */
    public function destroy($materialId)
    {
        $user = auth()->user();

        DB::table('bookmarks')
            ->where('user_id', $user->id)
            ->where('material_id', $materialId)
            ->delete();

        return redirect()->back()->with('success', 'Bookmark berhasil dihapus.');
    }
}
