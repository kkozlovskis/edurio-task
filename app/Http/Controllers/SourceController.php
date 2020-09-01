<?php

namespace App\Http\Controllers;

use App\Services\CsvService;
use App\Services\JsonService;
use App\Source;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SourceController extends Controller
{
    public function csv(): StreamedResponse
    {
        set_time_limit(0);
        $headers = [
            'Content-Type'          => 'text/csv',
            'Content-Disposition'   => 'attachment; filename="source.csv"',
        ];

        return new StreamedResponse(function () {
            CsvService::streamFileFromModel(['a', 'b', 'c'], new Source());
        }, Response::HTTP_OK, $headers);
    }

    public function json(Request $request): JsonResponse
    {
        $page = (int) $request->input('page');
        $pageSize = (int) $request->input('page_size');
        $data = [];

        if ($page && $pageSize) {
            $data = Source::forPage($page, $pageSize)->get()->toArray();
        }

        return JsonService::success($data);
    }
}
