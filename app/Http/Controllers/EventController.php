<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $event = Event::with('tickets')->get();

        return response()->json($event, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        Event::create($request->all());

        return response()->json('exit store', 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        Event::find($id)->update($request->all());

        return response()->json('exit update', 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request){
        Event::destroy($request->id);

        return response()->json('exit destroy',200);
    }

    /**
     * @param $id
     * @return JsonResponse}
     */
    public function quantity_tickets($id): JsonResponse
    {
        $event = Event::with('tickets')->find($id);
        $event->quantity = $event->seats - count($event->tickets);

        return response()->json($event,200);
    }
}
