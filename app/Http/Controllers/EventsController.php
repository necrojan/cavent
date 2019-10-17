<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Resources\Event as EventResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return EventResource
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string',
            'start' => 'nullable',
            'end' => 'nullable',
        ]);

        $event = Event::updateOrCreate(
            ['title' => $data['title']],
            ['start' => Carbon::parse($data['start']), 'end' => Carbon::parse($data['end'])]
        );

        return EventResource::make($event);
    }
}