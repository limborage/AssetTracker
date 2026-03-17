<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Http\Resources\AssetResource;
use App\Models\Asset;
use Symfony\Component\HttpFoundation\JsonResponse;

class AssetController extends Controller
{
    public function get(Asset $asset)
    {
        $asset->load('latestThreeInspections');

        $assetResource = new AssetResource($asset);

        return $assetResource->response()->setStatusCode(200);
    }

    public function create(AssetRequest $request): JsonResponse
    {
        $asset = Asset::create($request->validated());
        
        $asset->load('latestThreeInspections');

        $assetResource = new AssetResource($asset);

        return $assetResource->response()->setStatusCode(201);
    }
}
