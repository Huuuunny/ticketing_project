<x-layout>
    <div>
        <form class="space-y-6 md:space-y-3" action="{{ route('filter',['userID' => $userID] ) }}">
            @csrf
            <div class="container justify-center flex mx-auto">
                <div class="flex flex-col">
                    <div class="mx-3">
                    <input
                        type="text"
                        class="form-control block w-full px-3
                            py-2 my-2 m-0
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded
                            transition ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="numSerie" name="numSerie"
                        placeholder="N° Serie"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3">
                    <input
                    type="text"
                    class="form-control block w-full px-3
                            py-2 my-2 m-0
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded
                            transition ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="nomClient" name="nomClient"
                    placeholder="Nom client"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3">
                    <input
                        type="text"
                        class="form-control block w-full px-3
                            py-2 my-2 m-0
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded
                            transition ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="numDossier" name="numDossier"
                        placeholder="N° Dossier"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3">
                    <input
                    type="text"
                    class="form-control block w-full px-3
                            py-2 my-2 m-0
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded
                            transition ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="numTicket" name="numTicket"
                    placeholder="N° Ticket"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3">
                    <input
                    type="text"
                    class="form-control block w-full px-3
                            py-2 my-2 m-0
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded
                            transition ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="commentaire" name="commentaire"
                    placeholder="Commentaire"/>
                    </div>
                </div>
            </div>

            {{-- Selecteurs --}}
            <div class="container justify-center flex mx-auto">
                <div class="flex flex-col">
                    <div class="mx-3 md:mx-1">
                        <select
                        class="text-gray-700 text-base font-normal
                                py-1 my-1 ml-2
                                border border-solid border-gray-300 rounded
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="statut" id="statutSelect">
                            <option value="">--Choisir un statut</option>
                            @foreach ($statut as $stat)
                                <option value="{{ $stat->StatutTicket }}">{{ $stat->StatutTicket }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3 md:mx-1">
                        <select                         
                        class="text-gray-700 text-base font-normal
                        py-1 my-1 ml-2
                        border border-solid border-gray-300 rounded
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="type" id="type">
                            <option value="">--Choisir un type</option>
                            @for ($i = 0; $i < count($type) ; $i++)
                                <option value="{{ $type[$i] }}">{{ $type[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3 md:mx-1">
                        <select 
                        class="text-gray-700 text-base font-normal
                        py-1 my-1 ml-2
                        border border-solid border-gray-300 rounded
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="creator" id="creator">
                            <option value="">--Choisir un createur</option>
                            @for ($i = 0; $i < count($creator) ; $i++)
                                <option value="{{ $creator[$i] }}">{{ $creator[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3 md:mx-1">
                        <select
                        class="text-gray-700 text-base font-normal
                        py-1 my-1 ml-2
                        border border-solid border-gray-300 rounded
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="agence" id="agence" >
                            <option value="">--Choisir une agence</option>
                            @foreach ($salarie2 as $sal )
                                <option value="{{ $sal->Agence }}">{{ $sal->Agence }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mx-3 md:mx-1">
                        <select
                        class="text-gray-700 text-base font-normal
                        py-1 my-1 ml-2
                        border border-solid border-gray-300 rounded
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="urgence" id="urgence" >
                            <option value="">--Choisir une urgence</option>
                            @foreach ($urgence as $urg )
                                <option value="{{ $urg->ValeurUrgTicket }}">{{ $urg->LibelleUrgTicket }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="container justify-center flex mx-auto">
                <label class="inline my-auto p-2 text-sm font-medium text-gray-900" for="dateMin">Du :</label>
                <input type="date" name="dateMin" id="dateMin"
                class="
                my-2 mx-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5">

                <label class="inline my-auto p-2 text-sm font-medium text-gray-900" for="dateMin">Au :</label>
                <input type="date" name="dateMax" id="dateMax"
                class="
                my-2
                bg-gray-50
                border border-gray-300 
                text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                inline p-2.5">
            </div>
            <div class="container flex justify-center mx-auto">
                <div class="flex items-start">
                    <button type="submit" 
                    class="w-full 
                    text-white text-center text-sm 
                    bg-blue-600
                    transition delay-150 duration-300 
                    hover:bg-blue-800 
                    focus:ring-4 focus:outline-none focus:ring-blue-300 
                    font-medium 
                    rounded-lg 
                    px-5 py-2.5">Rechercher
                    </button>
                </div> 
            </div>
        </form>
    </div>

    
    {{-- Tableau des resultats --}}
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="flex justify-end mr-6">
                <x-link-button href="{{ route('create' ,['userID' => $userID]) }}" target="blank">
                    Nouveau Ticket
                </x-link-button>
            </div>
            <div class="w-full">
                <div class="border-1 border-solid rounded-md border-gray-900 shadow pt-6">
                  <table class="mb-8 table-fixed">
                    <thead class="bg-gray-50 w-10/12">
                        <tr>
                            <th class="px-2 py-2 text-xs text-gray-900">Ticket n°</th>
                            <th class="lg:px-2 lg:py-2 text-xs text-gray-900 md:hidden lg:inline-flex">Statut</th>
                            <th class="px-2 py-2 text-xs text-gray-900">Créé par</th>
                            <th class="px-2 py-2 text-xs text-gray-900">Probleme ticket</th>
                            <th class="px-2 py-2 text-xs text-gray-900">Type ticket</th>
                            <th class="lg:px-2 lg:py-2 text-xs w-28 lg:max-w-3xl lg:min-w-3xl md:max-w-sm overflow-hidden text-gray-900 md:hidden lg:inline-flex">N° de série</th>
                            <th class="lg:px-2 lg:py-2 text-xs text-gray-900 md:hidden lg:inline-flex ">Marque | Modele</th>
                            <th class="px-2 py-2 text-xs text-gray-900">Date</th>
                        </tr>     
                    </thead>
                    <tbody class="bg-gray-150 shadow-2xl">
                        @foreach ($tickets as $ticket)
                            <tr class="whitespace-nowrap transition delay-150 duration-300 hover:bg-slate-300">
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->NumTicket }}</td>
                                <td class="lg:px-4 lg:py-4 text-sm text-gray-900 md:hidden lg:inline-flex">{{ $ticket->StatutTicket }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->UserCreation }}</td>
                                <td class="px-4 py-4 text-sm w-96 lg:max-w-3xl lg:min-w-3xl md:max-w-sm overflow-hidden text-gray-900">{{ $ticket->ProbTicket }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->TypeTicket }}</td>
                                <td class="lg:px-4 lg:py-4 text-sm w-28 lg:max-w-3xl lg:min-w-3xl md:max-w-sm overflow-hidden text-gray-900 md:hidden lg:inline-flex">{{ $ticket->NumSerieTicket }}</td>
                                <td class="lg:px-4 lg:py-4 text-sm text-gray-900 md:hidden lg:inline-flex">{{ $ticket->MarqueModTicket }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->DateCreation->format('d/m/Y') }}</td>
                                <x-link-button href="{{ route('show',['userID' => $userID, 'ticket'=> $ticket->ID_Ticket ] ) }}" target="blank">
                                    Afficher
                                </x-link-button>
                                <x-link-button href="{{ route('edit',['userID' => $userID, 'ticket'=> $ticket->ID_Ticket ] ) }}" target="blank">
                                    Editer
                                </x-link-button>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex my-2">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</x-layout>