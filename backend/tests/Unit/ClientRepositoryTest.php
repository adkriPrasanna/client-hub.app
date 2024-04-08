<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\Client\ClientRepository;
use Illuminate\Support\Facades\Storage;

class ClientRepositoryTest extends TestCase
{
    public function testCheckIfFileExists()
    {
        Storage::fake('csv');
        Storage::disk('csv')->put('clients.csv', 'csvContent');
        $clientRepository = new ClientRepository();
        $this->assertTrue($clientRepository->checkIfFileExists());
        Storage::disk('csv')->delete('clients.csv');
        $this->assertFalse($clientRepository->checkIfFileExists());
    }

    public function testCreateCsvHeaders()
    {
        $clientRepository = new ClientRepository();
        $client = [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ];
        $expectedCsvHeaders = "Name,Email";
        $actualCsvHeaders = $clientRepository->createCsvHeaders($client);
        $this->assertEquals($expectedCsvHeaders, $actualCsvHeaders);
    }

    public function testCreateFile()
    {
        Storage::fake('csv');
        $clientRepository = new ClientRepository();
        $client = [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ];
        $result = $clientRepository->createFile($client);
        $this->assertTrue($result);
        Storage::disk('csv')->assertExists('clients.csv');
        $fileContent = Storage::disk('csv')->get('clients.csv');
        $this->assertEquals("Name,Email", $fileContent);
    }

    public function testPrepareCsvContent()
    {
        $clientRepository = new ClientRepository();
        $client = [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ];
        $expectedCsvContent = "John Doe,john@doe.com";
        $actualCsvContent = $clientRepository->prepareCsvContent($client);
        $this->assertEquals($expectedCsvContent, $actualCsvContent);
    }

    public function testFetchClients()
    {
        Storage::fake('csv');
        $csvContent = "Name,Email\nJohn Doe,john@doe.com\nJane Doe,jane@doe.com";
        Storage::disk('csv')->put('clients.csv', $csvContent);
        $clientRepository = new ClientRepository();
        $clients = $clientRepository->fetchClients();
        $expectedClients = [
            ['John Doe','john@doe.com'],
            ['Jane Doe','jane@doe.com'],
        ];
        $this->assertEquals($expectedClients, $clients);
    }
}
