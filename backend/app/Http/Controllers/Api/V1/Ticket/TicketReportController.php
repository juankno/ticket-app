<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
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
        $ticketCounts = Ticket::whereIn('status', ['NEW', 'OPEN', 'CLOSED'])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return new JsonResponse([
            'new' => $ticketCounts->get('NEW', 0),
            'open' => $ticketCounts->get('OPEN', 0),
            'closed' => $ticketCounts->get('CLOSED', 0),
        ]);
    }
}
