<?php

namespace App\Repositories\Client;

use Illuminate\Support\Facades\Storage;

class ClientRepository implements ClientInterface
{
    public function checkIfFileExists(): bool
    {
        return Storage::disk('csv')->exists('clients.csv');
    }

    public function createCsvHeaders($client): string
    {
        $csvHeaders = [];
        foreach ($client as $key => $value) {
            $csvHeader = str_replace('_', ' ', ucfirst($key));
            $csvHeaders[] = $csvHeader;
        }
        $csvHeaders = implode(',', $csvHeaders);
        return $csvHeaders;
    }

    public function createFile($client): bool
    {
        $csvFileName = 'clients.csv';
        $csvHeaders = $this->createCsvHeaders($client);
        return Storage::disk('csv')->put($csvFileName, $csvHeaders);
    }
}