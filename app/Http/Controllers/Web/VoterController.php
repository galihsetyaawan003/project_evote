<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterStoreRequest;
use App\Http\Requests\VoterUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Models\User;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class VoterController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('voter-view'), only: ['index', 'show']),
            new Middleware(PermissionMiddleware::using('voter-create'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('voter-update'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('voter-delete'), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //panggil model voter all utk mengambil semua data
          $voters = Voter::all();
        
          return view('pages.app.voter.index',compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.voter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoterStoreRequest $request)
    {
        try {

            //menambahkan di tabel user (karena email & password merupakan field dari User)
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            //memberikan role voter
            $user->assignRole('voter');

            //menambahkan nama di tabel voter yang berelasi dengan tabel user
            $user->voter()->create([
                'name' => $request->name
            ]);
        
            return redirect()->route('app.voter.index')->with('success', 'voter created successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create voter,'.$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voter = Voter::findOrFail($id);

        return view('pages.app.voter.show',compact('voter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voter = Voter::findOrFail($id);
       
       // dd($voter);

        return view('pages.app.voter.edit',compact('voter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoterUpdateRequest $request, string $id)
    {
        try {

            $voter = Voter::findOrFail($id);

            //update di tabel user
            $voter->user->update([
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $voter->user->password,
            ]);

            //update di tabel voter
            $voter->update([
                'name' => $request->name
            ]);
        
            return redirect()->route('app.voter.index')->with('success', 'Voter updated successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to updated voter,'.$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $voter = Voter::findOrFail($id);

            $voter->delete();
            
            return redirect()->route('app.voter.index')->with('success', 'voter deleted successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to deleted voter,'.$e->getMessage()]);
        }
    }
}
