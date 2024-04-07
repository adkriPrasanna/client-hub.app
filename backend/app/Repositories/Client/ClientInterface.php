<?php

namespace App\Repositories\Client;

interface ClientInterface
{
    public function checkIfFileExists(): bool;
    public function createCsvHeaders($client): string;
    public function createFile(array $client): bool;
    public function prepareCsvContent($client): string;
    public function fetchClients(): array;
}
