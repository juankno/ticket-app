<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\Api\V1\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @param Request $request
     * @response AnonymousResourceCollection<LengthAwarePaginator<TicketResource>>
     */
    public function index(Request $request)
    {
        return TicketResource::collection(Ticket::paginate($request->integer('per_page', 15)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTicketRequest $request
     * @return JsonResponse
     */
    public function store(StoreTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified ticket.
     *
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTicketRequest $request
     * @param Ticket $ticket
     * @return JsonResponse
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified ticket.
     *
     * @param Ticket $ticket
     * @return noContent
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->noContent();
    }
}
