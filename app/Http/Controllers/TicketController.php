<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $ticket = Ticket::all();

        return response()->json($ticket, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

        $ticket = new Ticket($request->all());
        $ticket->event_id = $request->event['id'];
        $ticket->save();

        return response()->json('exit store', 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        Ticket::find($id)->update($request->all());

        return response()->json('exit update', 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        Ticket::destroy($request->id);

        return response()->json('exit delete', 200);
    }
}
