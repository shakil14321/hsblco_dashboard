<?php

namespace App\Http\Repository\Admin;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientRepository
{
    public function all()
    {
        return Client::orderBy('position')->latest()->get();
    }

    public function store(array $data)
    {
        if (isset($data['logo'])) {
            $data['logo'] = $data['logo']->store('clients', 'public');
        }

        return Client::create($data);
    }

    public function update(Client $client, array $data)
    {
        if (isset($data['logo'])) {
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }

            $data['logo'] = $data['logo']->store('clients', 'public');
        }

        return $client->update($data);
    }

    public function delete(Client $client)
    {
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }

        return $client->delete();
    }
}
