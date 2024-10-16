<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket;
        $ticket->nombre = $request->nombre;
        $ticket->tipo_tramite = $request->tipo_tramite;
        $ticket->fecha = now();
        $ticket->estado = 0;
        $ticket->save();

        return redirect()->route('tickets.index')
                        ->with('mensaje', '¡El ticket fue registrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        $ticket->nombre = $request->nombre;
        $ticket->tipo_tramite = $request->tipo_tramite;
        $ticket->estado = $request->estado == '1' ? 1 : 0;
        $ticket->save();
        return redirect()->route('tickets.index')
                        ->with('mensaje', '¡El ticket fue actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        Ticket::find($ticket->id)->delete();
        return back()->with('mensaje', '¡El ticket fue eliminado!');
    }

    public function reporte()
    {
        $noatendidos = Ticket::select(DB::raw('count(*) as mes_count_0, month(fecha) as mes_0'))
                            ->where('estado', 0)
                            ->whereYear('fecha', '2024')
                            ->groupBy(DB::raw('month(fecha)'))
                            ->get();
        $siatendidos = Ticket::select(DB::raw('count(*) as mes_count_1, month(fecha) as mes_1'))
                            ->where('estado', 1)
                            ->whereYear('fecha', '2024')
                            ->groupBy(DB::raw('month(fecha)'))
                            ->get();
        // echo $noatendidos;
        // echo $siatendidos;
        // echo DB::table('tickets')->count();
        return view('tickets.reporte', compact('noatendidos', 'siatendidos'));
    }
}
