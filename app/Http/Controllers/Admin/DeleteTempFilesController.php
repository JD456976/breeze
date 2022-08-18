<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Services\FilepondService;

class DeleteTempFilesController extends Controller
{
    public function __invoke(Request $request, FilepondService $service)
    {
        $file = $service->retrieve($request->getContent())->filepath;

        Files::deleteTemp($service->retrieve($request->getContent())->id);

        Storage::delete($file);

        return Response::make('File Deleted', 200, ['content-type' => 'text/plain']);
    }
}
