<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Models\Client;
use App\Repository\Admin\ClientRepository;

class ClientController extends Controller
{
    public function __construct(
        protected ClientRepository $clientRepository
    ) {}

    public function index()
    {
        $clients = $this->clientRepository->all();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientRequest $request)
    {
        $this->clientRepository->store($request->validated());

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $this->clientRepository->update($client, $request->validated());

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $this->clientRepository->delete($client);

        return back()->with('success', 'Client deleted successfully.');
    }
}
