<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Action_etat;
use App\Models\Action_types;
use App\Models\Client;
use App\Models\Infraction;
use App\Models\Sanction;
use App\Models\Sinistre;
use App\Models\User;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

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
    }

    public function taches()
    {
        $actions = Action::where('responsable', Auth::user()->id)
            ->orWhere('rapporteur', Auth::user()->id)
            ->paginate(10);
        $users = User::all();
        $Action_etats = Action_etat::all();
        $action_types = Action_types::all();

        return view('clients.actions.actions', ['actions' => $actions, 'users' => $users, 'Action_etats' => $Action_etats, 'action_types' => $action_types]);

    }

    public function addAction(Request $request)
    {
        $action = new Action();
        $action->titre = $request->input('titre');;
        $action->dd = $request->input('dd');
        $action->df = $request->input('df');
        $action->responsable = (int)$request->input('responsable');
        $action->rapporteur = Auth::user()->id;
        $action->description = $request->description;
        $action->id_action_type = $request->id_action_type;

//        dd($action);
        $action->save();
        return redirect('/taches');
        return redirect()->back();
//        {{ url()->previous() }}
    }

    public function changeActionEtat(Request $request)
    {
        if ($request->ajax()) {
//            $this->validate($request, [
//                'email' => 'bail|required|email',
//                'message' => 'bail|required|max:250'
//            ]);
            // Gestion des données
//            return $request->action_id;
            $action = Action::find($request->action_id);
            $action->id_action_etat = $request->etat_id;

            $action->save();
            return (Action_etat::find($action->id_action_etat)->color);
        }
    }

    public function changeReponsable(Request $request)
    {
        if ($request->ajax()) {
//            $this->validate($request, [
//                'email' => 'bail|required|email',
//                'message' => 'bail|required|max:250'
//            ]);
            // Gestion des données
//            return $request->action_id;
            $action = Action::find($request->action_id);
            $action->responsable = $request->responsable;

            $action->save();
            return ($action->id);
        }
    }

    public function delete($id){
        $client=Client::find($id);
        Session::flash('success', "Client  $client->nom $client->prenom  suprime avec success.");

        $client->delete();

        return redirect()->route('clientslist');
    }

    public function getClients()
    {
        $clients = Client::where('user_id', Auth::user()->id)->paginate(10);
        return view('clients.clientslist', ['clients' => $clients]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        //
    }

    public function getClient($id)
    {
        $client = Client::find($id);


        $voiture = Voiture::where('client_id', $id)->get();
        if (!isset($voiture[0]->id)) $voiture = new Voiture(); else $voiture = $voiture[0];

        $sinistres = Sinistre::where('voiture_id', $voiture->id)->get();
        if ($sinistres == null) $sinistres = new Sinistre(); else $sinistres = $sinistres;

        //sanctions
        $sanctions = Sanction::where('client_id', $id)->get();

//
//        foreach ($sanctions as $sanction){
//            dd($sanction->infractions);
//            foreach ( $sanction->infractions as $infraction){
////
//              $infractions_ids[]=$infraction->id;
//
//            }
//            $infraction->infractions_ids=$infractions_ids;
//
//
////            $sanctionInfractions=Sanction_Infractions::where('sanction_id',$sanction->id)->get();
//        }
//        dd($sanction);
//
//        //infractions


        return view('clients.client', [
            'client' => $client,
            'voiture' => $voiture,
            'sinistres' => $sinistres,
            'sanctions' => $sanctions,
            'infractions' => Infraction::all()
        ]);
    }


    public function sinistresAdd(Request $request)
    {

        $objet = $request->all();
//        dd($objet);
//        $voiture= Sinistre::where('voiture_id',$objet['voiture_id'])->get()[0];
        $sinistre = new Sinistre();
        $sinistre->sinistre_id = $objet['sinistre_id'];
        $sinistre->sinistre_date = $objet['sinistre_date'];
        $sinistre->responsable = $objet['responsable'];
        $sinistre->voiture_id = $objet['voiture_id'];

        $sinistre->save();
        return redirect('client/c-' . Client::find(Voiture::find($sinistre->voiture_id)->client_id)->id);
        return redirect()->back();
//        {{ url()->previous() }}

    }

    public function sanctionsAdd(Request $request)
    {
        dd($request->all());

        $sanction = new Sanction();
        $sanction->client_id = $request->client_id;
        $sanction->date = $request->sanctionDate;
        $sanction->sanction_date_d = $request->sanctionDateD;
        $sanction->sanction_date_f = $request->sanctionDateF;
        $sanction->circonstance_pro = $request->has('circonstance_pro');
        $sanction->ethylotest = $request->sanctionEthylotest;
        $sanction->sangtest = $request->sanctionSangtest;

//        {{ url()->previous() }}
        $sanction->save();
        foreach (Infraction::all() as $infraction) $request->has("infractionIthem_" . $infraction->id) ? $sanction->infractions()->attach($infraction->id) : "";

//        dd($sanction);

        return redirect('client/c-' . $request->client_id);
        return redirect()->back();
    }


    //


    /**
     * Store a new user.
     *
     * @param Request $request
     * @return Response
     */

    public function clientAddForm(Request $request)
    {
        //TODO check Security issues valiations
        //
        if ($request->isMethod('post')) {
            $dataFormClient = $request->all();
            $columns = Schema::getColumnListing('clients');
            $client = null;

            $client = new Client();
            foreach ($columns as $key => $column)
                if (array_key_exists($column, $dataFormClient)) $client->$column = $dataFormClient[$column];
            $client->user_id = Auth::id();
            $client->save();
//        dd($client);


            //TODO check if Auto Submit
            //TODO Sante if Auto Submit
            //TODO Habitation    if Auto Submit
            $columns = Schema::getColumnListing('voitures');
            $voiture = new Voiture();
            foreach ($columns as $key => $column)
                if (array_key_exists($column, $dataFormClient)) $voiture->$column = $dataFormClient[$column];

            $voiture->client_id = $client->id;
            $voiture->save();

            Session::flash('success', 'Client mise à jour avec success.');

        } else {
//            dd($request->method());
            $client = new Client();
            $voiture = new Voiture();

        }
        $sinistres = [];
        return view('clients.client', ['client' => $client, 'voiture' => $voiture, 'sinistres' => $sinistres, 'infractions' => null]);


    }

    //Non utilisé code chngé vers clientAddForm @if
    public function add_client(Request $request)
    {
        $dataFormClient = $request->all();
        $columns = Schema::getColumnListing('clients');
        $client = null;

        $client = new Client();
        foreach ($columns as $key => $column)
            if (array_key_exists($column, $dataFormClient)) $client->$column = $dataFormClient[$column];
        $client->save();
//        dd($client);


        $columns = Schema::getColumnListing('voitures');
        $voiture = new Voiture();
        foreach ($columns as $key => $column)
            if (array_key_exists($column, $dataFormClient)) $voiture->$column = $dataFormClient[$column];

        $voiture->client_id = $client->id;
        $voiture->save();


        Session::flash('success', 'Client mise à jour avec success.');
        return view('clients.client', ['client' => $client, 'voiture' => $voiture]);


    }


    public function deleteSinistre($id)
    {
//        $sinistre=Sinistre::find($id);
//      dd($sinistre );
        Sinistre::find($id)->delete();
        return redirect()->back();
    }

    public function deleteSanction($id)
    {
//        $sinistre=Sinistre::find($id);
//      dd($sinistre );
//        Sanction::find($id)->infractions()->delete();
        Sanction::find($id)->delete();
        return redirect()->back();
    }


    public function edit_client(int $id, Request $request)
    {
        $dataFormClient = $request->all();
//        dd($dataFormClient);
        $columns = Schema::getColumnListing('clients');
        $client = null;

        $client = Client::find($id);
        foreach ($columns as $key => $column)
            if (array_key_exists($column, $dataFormClient)) $client->$column = $dataFormClient[$column];
        $client->save();


        $columns = Schema::getColumnListing('voitures');
        $voiture = Voiture::where('client_id', $client->id)->get();
        if (!isset($voiture[0]->id)) $voiture = new Voiture(); else $voiture = $voiture[0];
        foreach ($columns as $key => $column)
            if (array_key_exists($column, $dataFormClient)) $voiture->$column = $dataFormClient[$column];
        $voiture->client_id = $client->id;
        $voiture->save();
//        dd($voiture);

        $sinistres = Sinistre::where('voiture_id', $voiture->id)->get();
        if ($sinistres == null) $sinistres = new Sinistre(); else $sinistres = $sinistres;

        Session::flash('success', 'Client mise à jour avec success.');

        return redirect('client/c-' . $client->id)->with(['client' => $client, 'voiture' => $voiture, 'sinistres' => $sinistres]);

        return view('clients.client', ['client' => $client, 'voiture' => $voiture, 'sinistres' => $sinistres]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
//TODO first Action Pointeuse
