<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use DataTables;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        //
        Client::create($request->all());
        // $msg = "New client Created successful! ";
        // return redirect('client')->with('msg', $msg);
        return redirect()->route('clients.index')
        ->with('success', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $clients = client::findOrFail($client->id);
        return view('clients.edit', compact('clients'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        // dd($request);    
        $update = [
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "password"=>$request->password,
            "phone_number"=>$request->phone_number,
            "property"=>$request->property,
        ];
        $clients = Client::findOrFail($request->id);

        $clients->update($update);
        $msg = "Client Updated successful! ";
        return redirect('clients')->with('msg', $msg);
    }

    public function active($id){
        $client = client::findOrFail($id);
        if($client->active == 0){
            $client->active = "1";
            $client->save();
        }else{
            $client->active = "0";
            $client->save();
        }
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        
        $client->delete();
        
        return redirect()->route('clients.index')
            ->with('success', 'Client Has Been deleted successfully');
    }
    public function getclients(Client $client)
    {
        if ($request->ajax()) {
            $data = Client::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
       // $Clients = Client::sortable()->paginate(5);
        }
        
        return view('clients');
    }
}


