<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketReportController extends Controller
{
    /**
     * Get the ticket report.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse([
            'new' => rand(1, 10),
            'open' => rand(1, 10),
            'closed' => rand(1, 10),
        ]);
    }
}
