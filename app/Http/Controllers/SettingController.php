<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        $academicYears = AcademicYear::orderBy('start_date', 'desc')->get();
        $semesters = Semester::with('academicYear')->orderBy('start_date', 'desc')->get();
        
        return view('auth.admin.settings.index', compact('settings', 'academicYears', 'semesters'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        \App\Models\ActivityLog::log('update_settings', 'Admin updated system settings');

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    public function storeAcademicYear(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        AcademicYear::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => false,
        ]);

        \App\Models\ActivityLog::log('create_academic_year', 'Admin membuat tahun ajaran baru: ' . $request->name);
        return back()->with('success', 'Tahun Ajaran baru berhasil ditambahkan!');
    }

    public function setAcademicYear($id)
    {
        AcademicYear::query()->update(['is_active' => false]);
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->update(['is_active' => true]);

        \App\Models\ActivityLog::log('set_academic_year', 'Admin mengaktifkan tahun ajaran: ' . $academicYear->name);
        return back()->with('success', 'Tahun Ajaran ' . $academicYear->name . ' diaktifkan!');
    }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'name' => 'required|string|max:50',
            'type' => 'required|in:odd,even',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Semester::create([
            'academic_year_id' => $request->academic_year_id,
            'name' => $request->name,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => false,
        ]);

        \App\Models\ActivityLog::log('create_semester', 'Admin membuat semester baru: ' . $request->name);
        return back()->with('success', 'Semester baru berhasil ditambahkan!');
    }

    public function setSemester($id)
    {
        Semester::query()->update(['is_active' => false]);
        $semester = Semester::findOrFail($id);
        $semester->update(['is_active' => true]);

        \App\Models\ActivityLog::log('set_semester', 'Admin mengaktifkan semester: ' . $semester->name);
        return back()->with('success', 'Semester ' . $semester->name . ' diaktifkan!');
    }
}
