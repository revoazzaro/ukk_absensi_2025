<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('pages.karyawan-list', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.karyawan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required|min:8|max:255',
            'role' => 'required|in:admin,karyawan',
            'foto_profil' => 'image|mimes:png,jpg,jpeg'
        ]);

        $same_email = Karyawan::where('email', $request->email)->exists();
        if($same_email) return redirect()->back()->withInput()->withErrors(['email' => 'Email already registered!']);
        
        $data = $request->only('nama', 'email', 'role');
        $data['password'] = Hash::make($request->password);
        if($request->foto_profil) {
            $file = $request->file('foto_profil');
            $file_path = $file->store('foto_profil', 'public');
            if(!$file_path) return redirect()->back()->withInput()->withErrors(['foto_profil' => 'Foto profil failed to upload!']);
            $data['foto_profil'] = $file_path;
        }
        $insert = Karyawan::insert($data);
        if($insert) {
            return redirect()->route('karyawan_list');
        }
        return redirect()->back()->withInput()->withErrors(['nama' => 'Failed to insert karyawan!']);

    }

    /**
     * Display the specified resource.
     */
    public function profile()
    {
        return view('pages.profile'); 
    }

    public function update_profile (Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'foto_profil' => 'image|mimes:png,jpg,jpeg'
        ]);

        $data = $request->only('nama', 'email');
        $same_email = Karyawan::where('email', $request->email)->whereNot('id', Auth::user()->id)->exists();
        if($same_email) return redirect()->back()->withInput()->withErrors(['email' => 'Email already registered!']);

        if($request->foto_profil) {
            $file = $request->file('foto_profil');
            $file_path = $file->store('foto_profil', 'public');
            if(!$file_path) return redirect()->back()->withInput()->withErrors(['foto_profil' => 'Foto profil failed to upload!']);

            if(Auth::user()->foto_profil != 'foto_profil/default.png') {
                Storage::delete(Auth::user()->foto_profil);
            }
            $data['foto_profil'] = $file_path;
        }

        $update = Karyawan::find(Auth::user()->id)->update($data);
        if($update) return redirect()->route('profile');
        return redirect()->back()->withInput()->withErrors(['nama' => 'Failed to update profile!']);
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
