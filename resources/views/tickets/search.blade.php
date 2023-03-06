<x-layout>

    {{-- Tableau des resultats --}}
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            {{-- Lien vers la page d'accueil --}}
            <div class="flex">
                <a class="py-2 mt-11 flex justify-start text-lg transition delay-150 duration-300 hover:text-blue-700 text-gray-900" href="{{ route('home', ['userID' => $userID]) }}">Accueil</a>
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
                        {{-- Récupération de la vraiable $tickets passée depuis le contrôlleur
                        et boucle qui affiche chaque détail du ou des tickets récupéré --}}
                        @foreach ($tickets as $ticket)
                            <tr class="whitespace-nowrap transition delay-150 duration-300 hover:bg-slate-300">
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->NumTicket }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->StatutTicket }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $ticket->UserCreation }}</td>
                                <td class="px-4 py-4 text-sm max-w-3xl overflow-hidden text-gray-900">{{ $ticket->ProbTicket }}</td>
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
            {{-- Affichage de la pagination --}}
            <div class="flex my-2">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</x-layout>