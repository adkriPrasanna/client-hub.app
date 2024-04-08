<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreClientRequest;
use App\Repositories\Client\ClientInterface;

class ClientsController extends Controller
{
    use ResponseTrait;
    private $clientRepository;

    public function __construct(ClientInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function list(): JsonResponse {

        try {
            return $this->responseSuccess($this->clientRepository->list([]), 'Partners fetched successfully.');
        } catch (Exception $e) {
            Log::info($e->getMessage() . ' | File: ' . __FILE__ . ' | Line: ' . __LINE__);

            return $this->responseError();
        }
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        try {
            return $this->responseSuccess($this->clientRepository->store($request->all()), 'Partner added successfully.');
        } catch (Exception $e) {
            Log::info($e->getMessage() . ' | File: ' . __FILE__ . ' | Line: ' . __LINE__);

            return $this->responseError();
        }
    }
}
