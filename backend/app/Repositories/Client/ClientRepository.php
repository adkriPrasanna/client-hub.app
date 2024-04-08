<?php

namespace App\Repositories\Client;

use Illuminate\Support\Facades\Storage;
use App\Repositories\Crud\CrudRepository;

class ClientRepository extends CrudRepository implements ClientInterface
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

    public function prepareCsvContent($client): string
    {
        $csvContent = [];
        foreach ($client as $key => $value) {
            $csvContent[] = $value;
        }
        $csvContent = implode(',', $csvContent);
        return $csvContent;
    }

    public function fetchClients(): array
    {
        if (!$this->checkIfFileExists()) {
            return [];
        }
        $csvContent = Storage::disk('csv')->get('clients.csv');
        $rows = array_map('str_getcsv', explode(PHP_EOL, $csvContent));
        array_shift($rows); // skip header from csv file
        return $rows;
    }
}
