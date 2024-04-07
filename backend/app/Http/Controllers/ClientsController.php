<?php

namespace App\Http\Controllers;

use App\Repositories\Client\ClientInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{
    use ResponseTrait;
    private $clientRepository;

    public function __construct(ClientInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function store(Request $request): JsonResponse
    {
        Log::info($request->all());
        return $this->responseSuccess(['status' => 'test'], 'Partners fetched successfully.');
    }
}
