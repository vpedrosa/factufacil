<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('clients.list',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $this->save($client, $request);
        return redirect()->route('home')->with('status', '¡Cliente '.$client->id.' creado con éxito!');
    }

    /**
     * Stores a client in database
     *
     * @param Client $client
     * @param Request $request
     * @param bool $save
     */
    private function save(Client &$client, Request &$request, $save = true)
    {
        $client->name = $request->name;
        $client->nif = $request->nif;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->province = $request->province;
        $client->zip_code = $request->zip_code;
        if($save) $client->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.create', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->save($client, $request);
        return redirect()->route('home')->with('status', '¡Cliente '.$client->id.' actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('home')->with('status', '¡Cliente eliminado con éxito!');
    }
}
