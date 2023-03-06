<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\User2;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Traits\LoginTrait;
use App\Models\StatutTicket;
use App\Traits\ControlTrait;
use Illuminate\Http\Request;
use App\Models\UrgenceTicket;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    use LoginTrait;
    use ControlTrait;

    public function index($userID){
        $this->auth($userID);
        $user     = User::find($userID);
        $salarie2 = User::all();
        $tickets  = Ticket::where('Obsolete', 0)->paginate(9)->appends(request()->query());
        $statut   = StatutTicket::all();
        $urgence  = UrgenceTicket::orderBy('ValeurUrgTicket')->get();
        $type     = TypeTicket::groupBy('CommentAbrege')->pluck('CommentAbrege');
        $creator  = Ticket::groupBy('UserCreation')->pluck('UserCreation');

        return view('welcome', compact('userID','user','tickets','statut','urgence','type', 'creator', 'salarie2'));
    }
    
    public function filter(Request $request, $userID)
    {
        $this->auth($userID);
        $tickets   = Ticket::query();
        $nSerie    = $this->ctrl($request->query('numSerie'));
        $nomClient = $this->ctrl($request->query('nomClient'));
        $nDossier  = $this->ctrl($request->query('numDossier'));
        $nTicket   = $this->ctrl($request->query('numTicket'));
        $comment   = $this->ctrl($request->query('commentaire'));
        $statut    = $this->ctrl($request->query('statut'));
        $type      = $this->ctrl($request->query('type'));
        $creator   = $this->ctrl($request->query('creator'));
        $agence    = $this->ctrl($request->query('agence'));
        $urgence   = $this->ctrl($request->query('urgence'));
        $dateMin   = $this->ctrl($request->query('dateMin'));
        $dateMax   = $this->ctrl($request->query('dateMax'));

        if($nSerie != null){
            $tickets = $tickets->where('NumSerieTicket', 'like', "%$nSerie%");
        }
        if($nomClient != null){
            $tickets = $tickets->where('CodeClientTicket', 'like', "%$nomClient%");
        }
        if($nDossier != null){
            $tickets = $tickets->where('NumIntTicket', 'like',"%$nDossier%");
        }
        if($nTicket != null){
            $tickets = $tickets->where('NumTicket', 'like', "%$nTicket%");
        }
        if($comment != null){
            $tickets = $tickets->where('DetailTicket', 'like', "%$comment%");
        }
        if($statut != null){
            $tickets = $tickets->where('StatutTicket', $statut);
        }
        if($type != null){
            $tickets = $tickets->where('TypeTicket', $type);
        }
        if($creator != null){
            $tickets = $tickets->where('UserCreation', $creator);
        }
        if($agence != null){
            $tickets = $tickets->where('Agence', $agence);
        }
        if($urgence != null){
            $tickets = $tickets->where('UrgenceTicket', $urgence);
        }
        if($dateMin != null && $dateMax != null){
            $tickets = $tickets->whereBetween('DateCreation', [$dateMin, $dateMax])->orderBy('DateCreation', 'asc');
        }elseif($dateMin != null && $dateMax == null){
            $tickets = $tickets->whereDate('DateCreation', '>=', $dateMin )->orderBy('DateCreation', 'asc');
        }elseif($dateMax != null && $dateMin == null){
            $tickets = $tickets->whereDate('DateCreation', '<=', $dateMax )->orderBy('DateCreation', 'asc');
        }
        $tickets = $tickets->where('Obsolete', 0)->paginate(13)->appends(request()->query());
        

        return view('tickets.search', compact('tickets', 'userID') );
    }

    public function edit($userID, $ticketID)
    {
        $this->auth($userID);
        $user     = User::find($userID);
        $ticket   = Ticket::find($ticketID);
        $statut   = StatutTicket::all();
        $urgence  = UrgenceTicket::orderBy('ValeurUrgTicket')->get();
        $salarie  = User2::all();
        $salarie2 = User::all();
        $type     = TypeTicket::groupBy('CommentAbrege')->pluck('CommentAbrege');
        return view('tickets.edit', compact('ticket', 'userID', 'user', 'type', 'urgence', 'statut', 'salarie', 'salarie2'));
    }

    public function create($userID)
    {
        $this->auth($userID);
        $user     = User::find($userID);
        $statut   = StatutTicket::all();
        $type     = TypeTicket::groupBy('CommentAbrege')->pluck('CommentAbrege');
        $urgence  = UrgenceTicket::orderBy('ValeurUrgTicket')->get();
        $salarie2 = User::all(); 
        $now      = Carbon::now();
        $heureNow = $now->format("H:i:s");
        $dateNow  = $now->format("Y-m-d");
    
        return view('tickets.create', compact('user', 'userID', 'type', 'urgence', 'statut', 'dateNow', 'heureNow', 'salarie2' ));
    }

    public function store ($userID,  Request $request)
    {
        $this->auth($userID);
        
        // $request->validate([
        //     'numTicket'  => 'max:15|unique:mysql2.t_ticket,NumTicket',
        //     'dateDebut'  => 'before:dateFin',
        //     'datefin'    => 'after:dateDebut',
        // ]);

        $user     = User::find($userID);
        $now      = Carbon::now();
        $heureNow = $now->format("H:i:s");
        $dateNow  = $now->format("Y-m-d");

        $ticket = new Ticket;
        $ticket->DateCreation     = $dateNow;
        $ticket->HeureCreation    = $heureNow;
        $ticket->Obsolete         = 0;
        $ticket->UserCreation     = $this->ctrl($user->Util);
        $ticket->NumTicketOrg     = $this->ctrl($request->ticketOrg);
        $ticket->MarqueModTicket  = $this->ctrl($request->modeleMarque);
        $ticket->NumTicket        = $this->ctrl($request->numTicket);
        $ticket->CodeUserTicket   = $this->ctrl($request->user);
        $ticket->NumIntTicket     = $this->ctrl($request->nDossier);
        $ticket->NumSerieTicket   = $this->ctrl($request->nSerie);
        $ticket->CodeClientTicket = $this->ctrl($request->nomClient);
        $ticket->ProbTicket       = $this->ctrl($request->probleme);
        $ticket->DetailTicket     = $this->ctrl($request->commentaire);
        $ticket->StatutTicket     = $this->ctrl($request->statut);
        $ticket->DateTicket       = $this->ctrl($request->dateDebut);
        $ticket->HeureTicket      = $this->ctrl($request->heureDebut);
        $ticket->DateFinTicket    = $this->ctrl($request->dateFin);
        $ticket->HeureFinTicket   = $this->ctrl($request->heureFin);
        $ticket->TempsPasse       = $this->ctrl($request->tempsPasse);
        $ticket->TypeTicket       = $this->ctrl($request->editType);
        $ticket->Agence           = $this->ctrl($request->agence);
        $ticket->UrgenceTicket    = $this->ctrl($request->urgence);

        if(!empty($request->document)){
            $file = Storage::disk('local')->put('documents', $request->document);
            $ticket->id_documents = $this->ctrl($file);
        }else{
            $ticket->id_documents = "";
        }

        switch ($this->ctrl($request->urgence)){
            case "Pour Information":
                $ticket->UrgenceTicket = 2;
                break;
            case "Pas Très Urgent":
                $ticket->UrgenceTicket = 4;
                break;
            case "Moyennement Urgent":
                $ticket->UrgenceTicket = 6;
                break;
            case "Urgent":
                $ticket->UrgenceTicket = 8;
                break;
            case "Très Urgent":
                $ticket->UrgenceTicket = 10;
                break;
            default:
                $ticket->UrgenceTicket = 0;
                break;
        }

        $ticket->save();
        return back()->with('message', "le ticket à bien été créé !");
    }

    public function update($userID,  Request $request, Ticket $ticket)
    {
        $this->auth($userID);

        $ticket->CodeUserTicket   = $this->ctrl($request->user);
        $ticket->MarqueModTicket  = $this->ctrl($request->modeleMarque);
        $ticket->NumIntTicket     = $this->ctrl($request->nDossier);
        $ticket->NumSerieTicket   = $this->ctrl($request->nSerie);
        $ticket->CodeClientTicket = $this->ctrl($request->nomClient);
        $ticket->ProbTicket       = $this->ctrl($request->probleme);
        $ticket->DetailTicket     = $this->ctrl($request->commentaire);
        $ticket->StatutTicket     = $this->ctrl($request->statut);
        $ticket->DateTicket       = $this->ctrl($request->dateDebut);
        $ticket->HeureTicket      = $this->ctrl($request->heureDebut);
        $ticket->DateFinTicket    = $this->ctrl($request->dateFin);
        $ticket->HeureFinTicket   = $this->ctrl($request->heureFin);
        $ticket->TempsPasse       = $this->ctrl($request->tempsPasse);
        $ticket->TypeTicket       = $this->ctrl($request->editType);
        $ticket->Agence           = $this->ctrl($request->agence);

        if(!empty($request->document)){
            $file = Storage::disk('local')->put('documents', $request->document);
            $ticket->id_documents = $this->ctrl($file);
        }

        if($request->archiver == true){
            $ticket->Obsolete = 1;
        }else{
            $ticket->Obsolete = 0;
        }

        switch ($this->ctrl($request->urgence)){
            case "Pour Information":
                $ticket->UrgenceTicket = 2;
                break;
            case "Pas Très Urgent":
                $ticket->UrgenceTicket = 4;
                break;
            case "Moyennement Urgent":
                $ticket->UrgenceTicket = 6;
                break;
            case "Urgent":
                $ticket->UrgenceTicket = 8;
                break;
            case "Très Urgent":
                $ticket->UrgenceTicket = 10;
                break;
        }
        
        $ticket->save();
        return back()->with('message', "le ticket à bien été modifié !");

    }
}