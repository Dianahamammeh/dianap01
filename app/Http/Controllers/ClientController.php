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
    public function index(Request $request)
    {
        //
        $name = $request->query('search') ;
        if (isset($name)) {
            $clients = Client::where('full_name', 'LIKE', '%' . $name . '%')->
                orWhere('email', 'LIKE', '%' . $name . '%')->get();
        } else 
            $clients = Client::all();
        
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
    public function show($id)
    {
        //
        $client = client::find($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Product::find($id);

        $clients = client::find($id);
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

        $request->validate([
            // 'phone_number' => 'required|regex:/^\+(?:[0-9] ?){8,14}[0-9]$/',
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]) ; 
        // dd($client);

        $update = [
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            // "password"=>$request->password,
            "phone_number"=>$request->phone_number,
            "property"=>$request->property,
            // $phone_number = $_REQUEST['phone_number']['full'];
        ];
        // $clients = Client::findOrFail($request->id);
        // dd($client);

        $client->update($update);
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
    public function destroy(Request $request)
    {
        // dd($request->id);
        Client::where('id', $request->id)->delete();

        // $client->delete();
        // return redirect()->back()
        // ->with('success', 'Client Has Been deleted successfully');
        return response()->json(['success' => true, 'message' => 'Client Has Been deleted successfully']);
       // table.clear().draw();


        // Client::where('id', $request->id)->delete();
        
        // return redirect()->route('destroyclient')
        //     ->with('success', 'Client Has Been deleted successfully');
        //     return redirect()->back(); 

    
    }
    public function getclients(Client $client)
    {
        
            if (request()->ajax()) {
                // return datatables()->of(Product::select('*'))
                $data = Client::select('id', 'full_name', 'email','phone_number', 'property','active');
                return Datatables::of($data)->addIndexColumn()
                    ->addIndexColumn()
                    ->addColumn('active', function($row){       
                                if ($row->active == '0')
                                   $btn= '<a href=' . route('clients.active', $row->id) . ' class="btn btn-primary btn-sm">Activate</a>';
                                   else
                                   $btn= '<a href=' . route('clients.active', $row->id) .' class="btn btn-secondary btn-sm">Deactivate</a>' ;
                                 return $btn;  
                      })
                    ->addColumn('action', 'clients.action')
                    ->rawColumns(['active', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            return view('clients');
                    
       // $Clients = Client::sortable()->paginate(5);
        }
        
        // return view('clients');
    // }
}


