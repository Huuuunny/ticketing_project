<x-layout>
<div class="flex">
    <a class="py-2 lg:mt-11 flex justify-start md:ml-20 lg:ml-40 text-lg transition delay-150 duration-300 hover:text-blue-700 text-gray-900" href="{{ route('home', ['userID' => $userID]) }}">Accueil</a>
</div>    
    <div class="w-10/12 p-1 mb-9 md:mb-6 bg-white border-2 border-solid border-gray-200 rounded-lg justify-center mx-auto focus:text-gray-700  shadow-2xl">
        <h5 class="text-xl font-medium flex justify-center mx-auto text-gray-900">Ticket N° {{ $ticket->NumTicket }}</h5>
            @switch($ticket->UrgenceTicket)
                @case(2)
                    <div class="border-1 border-solid rounded-lg w-6/12 mx-auto my-8" style="background-color: #045FB4 "><p style="color: #045FB4">.</p></div>
                    @break
                @case(4)
                    <div class="border-1 border-solid rounded-lg w-6/12 mx-auto my-8" style="background-color: #CED8F6 "><p style="color: #CED8F6">.</p></div>
                    @break
                @case(6)
                    <div class="border-1 border-solid rounded-lg w-6/12 mx-auto my-8" style="background-color: #FAAC58 "><p style="color: #FAAC58">.</p></div>
                    @break
                @case(8)
                    <div class="border-1 border-solid rounded-lg w-6/12 mx-auto my-8" style="background-color: #FE642E "><p style="color: #FE642E">.</p></div>
                    @break
                @case(10)
                    <div class="border-1 border-solid rounded-lg w-6/12 mx-auto my-8" style="background-color: #FF0000"><p style="color: #FF0000">.</p></div>
                    @break
            @endswitch
            <div class="my-5 lg:flex justify-center mx-auto">
                <div class="md:flex md:justify-center">
                    <label for="user" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">Modifié par</label>
                    <input type="text" name="user" id="user" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ $ticket->CodeUserTicket }}" disabled>

                    <label for="nSerie" class="my-2 p-2 text-sm font-medium text-gray-900 ">N° de série</label>
                    <input type="text" name="nSerie" id="nSerie" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ $ticket->NumSerieTicket }}" disabled>
                </div>

                <div class="md:flex md:justify-center">
                    <label for="nomClient" class="my-2 p-2 text-sm font-medium text-gray-900 ">Nom du client</label>
                    <input type="text" name="nomClient" id="nomClient" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ $ticket->CodeClientTicket }}" disabled>

                    <label for="modeleMarque" class="my-2 p-2 text-sm font-medium text-gray-900 ">Modele | Marque</label>
                    <input type="text" name="modeleMarque" id="modeleMarque" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ $ticket->MarqueModTicket }}" disabled>
                </div>
            </div>

        <div class="my-5 lg:flex justify-center mx-auto">
            <div class="md:flex md:justify-center">
                <label for="typeTicket" class="inline my-2 p-2 text-sm font-medium text-gray-900 ">Type de ticket</label>
                <input type="text" name="typeTicket" id="typeTicket" 
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5 "
                value="{{ $ticket->TypeTicket }}" disabled>

                <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="urgence" >Urgence ticket</label>
                <input type="text" name="urgence" id="urgence" disabled
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5 "
                @switch($ticket->UrgenceTicket)
                    @case(2)
                        value="Pour information"
                        @break
                    @case(4)
                        value="Pas très urgent"
                        @break
                    @case(6)
                        value="Moyennement urgent"
                        @break
                    @case(8)
                        value="Urgent"
                        @break
                    @case(10)
                        value="Très urgent"
                        @break
                    @default
                @endswitch>
            </div>

            <div class="md:flex md:justify-center">
                <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="agence" >Agence</label>
                <input type="text" name="agence" id="agence" 
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5 "
                value="{{ $ticket->Agence }}" disabled>

                <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="statut">Statut ticket</label>
                <input type="text" name="statut" id="statut" 
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5 "
                value="{{ $ticket->StatutTicket }}" disabled>
            </div>    
        </div>

        <div class="container flex justify-center my-5 mx-auto">
            <label for="probleme" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900 ">Probleme</label>
            <textarea id="message" rows="5" name="probleme" id="probleme" disabled
            class="block p-2.5 w-6/12 my-2 mx-auto 
            text-sm text-gray-900 
            bg-gray-50 
            rounded-lg border border-gray-300 
            focus:ring-blue-500 focus:border-blue-500 
            dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $ticket->ProbTicket }}
            </textarea>

            <label for="commentaire" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900">Commentaires</label>
            <textarea id="message" rows="5" name="commentaire" id="commentaire" disabled
            class="block p-2.5 w-6/12 my-2 mx-auto mr-3
            text-sm text-gray-900 
            bg-gray-50 
            rounded-lg border border-gray-300 
            focus:ring-blue-500 focus:border-blue-500 
            dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $ticket->DetailTicket }}
            </textarea>
        </div>

        <div class=" container flex justify-center my-5 mx-auto">
            <div class="flex inline">
                <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="dateDebut">Debut du ticket</label>
                <input type="date" name="dateDebut" id="dateDebut"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5"
                value="{{ $ticket->DateTicket->format("Y-m-d") }}" disabled>

                <input type="time" name="heureDebut" id="heureDebut"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5"
                value="{{ $ticket->HeureTicket }}" disabled>
            </div>
        </div>

        <div class=" container flex justify-center my-5 mx-auto">
            <div class="flex inline">
                <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="dateFin">Fin du ticket</label>
                <input type="date" name="dateFin" id="dateFin"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5"
                value="{{ $ticket->DateFinTicket->format("Y-m-d") }}" disabled>
                
                <input type="time" name="heureFin" id="heureFin"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5"
                value="{{ $ticket->HeureFinTicket }}" disabled>
            </div>
        </div>

        <div class=" container flex justify-center my-5 mx-auto">
            <div class="flex inline">
                <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="tempsPasse">Temps passé</label>
                <input type="number" name="tempsPasse" id="tempsPasse"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5"
                value="{{ $ticket->TempsPasse }}" disabled>
                <p class="inline my-2 mx-1 p-2 text-sm font-medium text-gray-900">Min</p>
            </div>
        </div>

        <div class="container flex justify-center my-5 mx-auto">
            <x-link-button href="{{ route('edit',['userID' => $userID, 'ticket'=> $ticket->ID_Ticket ] ) }}" target="blank">
                Editer
            </x-link-button>
        </div> 
    </div>
</x-layout>