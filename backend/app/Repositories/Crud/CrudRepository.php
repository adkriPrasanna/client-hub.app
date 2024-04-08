<?php

namespace App\Repositories\Crud;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

abstract class CrudRepository implements CrudInterface
{
    public function store($client): JsonResponse
    {
        if (!$this->checkIfFileExists()) {
            $this->createFile($client);
        }

        $csvContent = $this->prepareCsvContent($client);

        $csvFileName = 'clients.csv';
        Storage::disk('csv')->append($csvFileName, $csvContent);

        return response()->json(['data' => $csvContent]);
    }

    public function list(): JsonResponse
    {
        if (!$this->checkIfFileExists()) {
            return response()->json(['data' => []]);
        }

        $csvContent = $this->fetchClients();

        return response()->json(['data' => $csvContent]);
    }
}
