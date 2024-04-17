<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        Session::flash('success', 'Client added successfully');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
    }

    /*** Remove the specified resource from storage.*/
    public function trash($id)
    {
        Client::Destroy($id);
        Session::Flash('success', 'Client trashed successfully');
        return redirect()->route('clients.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::withTrashed()->where('id', $id)->first();
        $client->forceDelete();
        Session::Flash('success', 'Client deleted successfully');
        return redirect()->route('clients.index');
    }

    public function restore($id)
    {
        $client = Client::withTrashed()->where('id', $id)->first();
        $client->restore();
        Session::Flash('success', 'Client restored successfully');
        return redirect()->route('clients.trashed');
    }
}
