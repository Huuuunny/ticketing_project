<x-layout>
    <div class="flex">
        <a class="py-1 lg:mt-11 flex justify-start md:ml-20 lg:ml-40 text-lg transition delay-150 duration-300 hover:text-blue-700 text-gray-900" href="{{ route('home', ['userID' => $userID]) }}">Accueil</a>
    </div>
    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="my-3 list-disc flex justify-center list-inside jud text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-10/12 p-1 mb-9 md:mb-4 bg-white border-2 border-solid border-gray-200 rounded-lg justify-center mx-auto focus:text-gray-700 shadow-2xl">
        <form class="space-y-3" action="{{ route('update',['userID' => $userID, 'ticket' => $ticket->ID_Ticket] ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

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
                        <label for="user" class="my-2 p-2 text-sm font-medium text-gray-900 ">Modifié par</label>
                        <input type="text" name="user" id="user" 
                        class="
                        my-2 mx-2
                        bg-gray-50
                        border border-gray-300 
                        text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500
                        inline p-2.5 "
                        value="{{ $user->Util }}" 
                        required disabled>

                        <label for="nSerie" class="my-2 p-2 text-sm font-medium text-gray-900 ">N° de série</label>
                        <input type="text" name="nSerie" id="nSerie" 
                        class="
                        my-2 mx-2
                        bg-gray-50
                        border border-gray-300 
                        text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500
                        inline p-2.5"
                        value="{{ $ticket->NumSerieTicket }}">
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
                        value="{{ $ticket->CodeClientTicket }}" >

                        <label for="modeleMarque" class="my-2 p-2 text-sm font-medium text-gray-900 ">Modele | Marque</label>
                        <input type="text" name="modeleMarque" id="modeleMarque" 
                        class="
                        my-2 mx-2
                        bg-gray-50
                        border border-gray-300 
                        text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500
                        inline p-2.5 "
                        value="{{ $ticket->MarqueModTicket }}">
                    </div>    
                </div>

            <div class="my-5 lg:flex justify-center mx-auto">
                <div class="md:flex md:justify-center">
                    <label for="editType" class="inline my-2 p-2 text-sm font-medium text-gray-900 ">Type de ticket</label>
                    <select name="editType" id="editType" class="my-2 mx-2 border border-solid border-gray-600">
                        @for ($i = 0; $i < count($type) ; $i++)
                            <option value="{{ $type[$i] }}">{{ $type[$i] }}</option>
                        @endfor
                    </select>

                    <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="urgence" >Urgence ticket</label>
                    <select name="urgence" id="urgence" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($urgence as $urg)
                            <option value="{{ $urg->LibelleUrgTicket }}">{{ $urg->LibelleUrgTicket }}</option>
                        @endforeach
                    </select>
            
                </div>
                
                <div class="md:flex md:justify-center">
                    <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="agence" >Agence</label>
                    <select name="agence" id="agence" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($salarie2 as $sal )
                            <option value="{{ $sal->Agence }}">{{ $sal->Agence }}</option>
                        @endforeach
                    </select>

                    <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="statut">Statut ticket</label>
                    <select name="statut" id="statut" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($statut as $stat)
                            <option value="{{ $stat->StatutTicket }}">{{ $stat->StatutTicket }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- <div class="container flex justify-center mx-auto">
                <label for="affectation" class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">Affectation</label>
                <select name="affectation" id="affectation" class="my-2 mx-2 border border-solid border-gray-600" >
                    @foreach ($salarie as $sal )
                        <option value="{{ $sal->NomSal }}">{{ $sal->NomSal }}</option>                            
                    @endforeach
                </select>
            </div> --}}

            <div class="container flex justify-center mx-auto">
                <label for="probleme" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900 ">Probleme</label>
                <textarea  rows="5" name="probleme" id="probleme"
                class="block p-2.5 w-6/12 my-2 mx-auto 
                text-sm text-gray-900 
                bg-gray-50 
                rounded-lg border border-gray-300 
                focus:ring-blue-500 focus:border-blue-500 
                dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{ $ticket->ProbTicket }}
                </textarea>

                <label for="commentaire" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900">Commentaires</label>
                <textarea  rows="5" name="commentaire" id="commentaire"
                class="block p-2.5 w-6/12 my-2 mx-auto
                text-sm text-gray-900 
                bg-gray-50 
                rounded-lg border border-gray-300 
                focus:ring-blue-500 focus:border-blue-500 
                dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{ $ticket->DetailTicket }}
                </textarea>
            </div>
            
            {{-- <div class="container flex justify-center mx-auto">
                <label for="probleme" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900 ">Probleme</label>
                <x-rich-text name="probleme" id="probleme">{{ $ticket->ProbTicket }}</x-rich-text>

                <label for="commentaire" class="flex my-3 mx-3 justify-center text-sm font-medium text-gray-900">Commentaires</label>
                <x-rich-text name="commentaire" id="commentaire">{{ $ticket->DetailTicket }}</x-rich-text>

            </div> --}}
            
            <div class="flex items-center justify-center w-full">
                <label class="mx-2" for="document">Ajouter un fichier :</label>
                <input type="file" id="document" name="document" accept="image/png, image/jpg">
            </div>

            <div class="flex justify-center mx-auto">

            </div>

            <div class=" container flex justify-center mx-auto">
                <div class="flex inline">
                    <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="dateDebut">Debut du ticket</label>
                    <input type="date" name="dateDebut" id="dateDebut"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ $ticket->DateTicket->format("Y-m-d") }}"
                    required>

                    <input type="time" name="heureDebut" id="heureDebut"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ $ticket->HeureTicket }}"
                    required>
                </div>
            </div>

            <div class=" container flex justify-center mx-auto">
                <div class="flex inline">
                    <label class="inline my-2 p-2 text-sm font-medium text-gray-900" for="dateFin">Fin du ticket</label>
                    <input type="date" name="dateFin" id="dateFin"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ $ticket->DateFinTicket->format("Y-m-d") }}"
                    required>
                    
                    <input type="time" name="heureFin" id="heureFin"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ $ticket->HeureFinTicket }}"
                    required>
                </div>
            </div>

            <div class=" container flex justify-center mx-auto">
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
                    value="{{ $ticket->TempsPasse }}">
                    <p class="inline my-2 mx-1 p-2 text-sm font-medium text-gray-900">Min</p>
                </div>
            </div>

            <div class=" container flex justify-center mx-auto">
                <div class="flex inline">
                    <label class="inline p-2 text-sm font-medium text-gray-900" for="tempsPasse">Archiver</label>
                    <input type="checkbox" name="archiver" id="archiver"
                    @if ($ticket->Obsolete == true)
                        checked
                    @endif
                    class="
                    mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5">                  
                </div>
            </div>

            <div class="flex items-start">
                <button type="submit" 
                class="
                w-1/4 mx-auto mb-3
                text-white text-center text-sm 
                bg-blue-600
                transition delay-150 duration-300
                hover:bg-blue-800 
                focus:ring-4 focus:outline-none focus:ring-blue-300 
                font-medium 
                rounded-lg 
                px-5 py-2.5">Modifier Ticket
                </button>
            </div> 
        </form>
    </div>
</x-layout>