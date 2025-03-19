<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Mail\ClientAdded;
use App\Mail\ClientPremium;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Routing\Controllers\HasMiddleware;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('manage-users');
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Gate::authorize('manage-users');
        $client = new Client();
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->premium = $request->input('premium', false);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $client->image_path = $path;
        }

        $client->save();

        Mail::to('admin@example.com')->send(new ClientAdded($client));

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
        Gate::authorize('manage-users');
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        Gate::authorize('manage-users');
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->premium = $request->input('premium', false);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $client->image_path = $path;
        }

        $client->save();

        if ($client->premium) {
            Mail::to('admin@example.com')->send(new ClientPremium($client));
        }

        return redirect()->route('clients.show', $client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
