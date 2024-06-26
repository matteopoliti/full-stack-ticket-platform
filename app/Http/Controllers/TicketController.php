<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Category;
use App\Models\Operator;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('pages.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operators = Operator::leftJoin('tickets', function ($join) {
            $join->on('operators.id', '=', 'tickets.operator_id')
                ->where(function ($query) {
                    $query->where('tickets.stato', '=', 'ASSEGNATO')
                        ->orWhere('tickets.stato', '=', 'IN LAVORAZIONE');
                });
        })
            ->whereNull('tickets.operator_id')
            ->select('operators.*')
            ->get();

        $stato_tickets = ["ASSEGNATO", "IN LAVORAZIONE", "CHIUSO"];

        $categories = Category::all();

        return view('pages.tickets.create', compact('operators', 'stato_tickets', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $val_data = $request->validated();


        $slug = Str::slug($request->titolo, '-');
        $val_data['slug'] = $slug;

        $newTicket = Ticket::create($val_data);

        return redirect()->route('dashboard.tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('pages.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {


        $stato_tickets = ["ASSEGNATO", "IN LAVORAZIONE", "CHIUSO"];

        return view('pages.tickets.edit', compact('ticket', 'stato_tickets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $val_data = $request->validated();


        // $slug = Str::slug($request->titolo, '-');
        // $val_data['slug'] = $slug;

        $ticket->update($val_data);

        return redirect()->route('dashboard.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
