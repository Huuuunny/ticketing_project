<x-layout>
    <div class="flex">
        <a class="py-2 lg:mt-11 flex justify-start md:ml-20 lg:ml-40 text-lg transition delay-150 duration-300 hover:text-blue-700 text-gray-900" href="{{ route('home', ['userID' => $userID]) }}">Accueil</a>
    </div>
    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="my-3 list-disc flex justify-center list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-10/12 p-1 mb-9 bg-white border-2 border-solid border-gray-200 rounded-lg justify-center mx-auto focus:text-gray-700 shadow-2xl">
        <form class="space-y-3" action="{{ route('store',['userID' => $userID] ) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="lg:flex justify-center mx-auto">
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
                    value="{{ old('user', $user->Util) }}" 
                    required disabled>

                    <label for="numTicket" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">N° Ticket</label>
                    <input type="number" name="numTicket" id="numTicket" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ old('numTicket') }}" 
                    required>
                </div>
            </div>
            <div class="lg:flex justify-center mx-auto">
                <div class="md:flex md:justify-center">
                    <label for="modeleMarque" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">Modele | Marque</label>
                    <input type="text" name="modeleMarque" id="modeleMarque" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ old('modeleMarque') }}">

                    <label for="ticketOrg" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">N° Ticket d'origine</label>
                    <input type="number" name="ticketOrg" id="ticketOrg" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="0"
                    required>
                </div>

                <div class="md:flex md:justify-center">
                    <label for="nomClient" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">Nom du client</label>
                    <input type="text" name="nomClient" id="nomClient" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5 "
                    value="{{ old('nomClient') }}">

                    <label for="nSerie" class="my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">N° de série</label>
                    <input type="text" name="nSerie" id="nSerie" 
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ old('nSerie') }}">
                </div>
            </div>
            <div class="lg:flex justify-center mx-auto">
                <div class="md:flex md:justify-center">
                    <label for="editType" class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900 ">Type de ticket</label>
                    <select name="editType" id="editType" class="my-2 mx-2 border border-solid border-gray-600">
                        @for ($i = 0; $i < count($type) ; $i++)
                            <option value="{{ old('editType', $type[$i]) }}">{{ $type[$i] }}</option>
                        @endfor
                    </select>

                    <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="urgence" >Urgence ticket</label>
                    <select name="urgence" id="urgence" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($urgence as $urg)
                            <option value="{{ old('urgence', $urg->LibelleUrgTicket ) }}">{{ $urg->LibelleUrgTicket }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:flex md:justify-center">
                    <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="statut">Statut ticket</label>
                    <select name="statut" id="statut" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($statut as $stat)
                            <option value="{{ old('statut', $stat->StatutTicket) }}">{{ $stat->StatutTicket }}</option>
                        @endforeach
                    </select>

                    <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="agence" >Agence</label>
                    <select name="agence" id="agence" class="my-2 mx-2 border border-solid border-gray-600" >
                        @foreach ($salarie2 as $sal )
                            <option value="{{ old('agence', $sal->Agence ) }}">{{ $sal->Agence }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="container flex justify-center mx-auto">
                <label for="probleme" class="flex mx-3 my-3 justify-center text-sm font-medium text-gray-900 ">Probleme</label>
                <textarea id="message" rows="5" name="probleme" id="probleme"
                class="block p-2.5 w-6/12 my-2 mx-auto 
                text-sm text-gray-900 
                bg-gray-50 
                rounded-lg border border-gray-300 
                focus:ring-blue-500 focus:border-blue-500 
                dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{ old('probleme') }}
                </textarea>

                <label for="commentaire" class="flex mx-3 my-3 justify-center text-sm font-medium text-gray-900">Commentaires</label>
                <textarea id="message" rows="5" name="commentaire" id="commentaire"
                class="block p-2.5 w-6/12 my-2 mx-auto
                text-sm text-gray-900 
                bg-gray-50 
                rounded-lg border border-gray-300 
                focus:ring-blue-500 focus:border-blue-500 
                dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{ old('commentaire') }}
                </textarea>
            </div>
            
            <div class="flex items-center justify-center w-full">
                <label class="mx-2" for="document">Ajouter un fichier :</label>
                <input type="file" id="document" name="document" accept="image/png, image/jpg">     
            </div>

            <div class=" container flex justify-center mx-auto">
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
                    value="{{ old('dateDebut', $dateNow) }}"
                    required>

                    <input type="time" name="heureDebut" id="heureDebut"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ old('heureDebut', $heureNow) }}"
                    required>
                </div>
            </div>

            <div class=" container flex justify-center mx-auto">
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
                    value="{{ old('dateFin') }}"
                    required>
                    
                    <input type="time" name="heureFin" id="heureFin"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ old('heureFin') }}"
                    required>
                </div>
            </div>

            <div class=" container flex justify-center mx-auto">
                <div class="flex inline">
                    <label class="inline my-2 mx-2 p-2 text-sm font-medium text-gray-900" for="tempsPasse">Temps passé</label>
                    <input type="number" name="tempsPasse" id="tempsPasse"
                    class="
                    my-2 mx-2
                    bg-gray-50
                    border border-gray-300 
                    text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500
                    inline p-2.5"
                    value="{{ old('tempsPasse') }}">
                    <p class="inline my-2 mx-1 p-2 text-sm font-medium text-gray-900">Min</p>
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
                px-5 py-2.5">Créer Ticket
                </button>
            </div> 
        </form>
    </div>
</x-layout>
