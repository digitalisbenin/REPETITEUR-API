
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <label for="table-search" class="block mb-2 text-3xl uppercase  font-medium text-gray-900 ">Liste des demandes</label>


    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    N°
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom et  PRENOM
                </th>

                <th scope="col" class="px-6 py-3">
                    CLASSE
                </th>
                {{--  <th scope="col" class="px-6 py-3">
                    PARENTS
                </th>  --}}
                <th scope="col" class="px-6 py-3">
                    MATIERE
                </th>
                {{--  <th scope="col" class="px-6 py-3">
                    REPETITEUR
                </th>  --}}
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3">
                    MOTIF
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demande as $keys =>   $enfant)
            <tr class="text-lg bg-white border-b   hover:bg-gray-50 ">
                
                <th scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                {{ $keys + 1 }}
            </th>

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ $enfant->enfants->fname }}  {{ $enfant->enfants->lname }}
                </th>

                <td class="px-6 py-4">
                    {{ $enfant->tarification->classe->name }}
                </td>
                {{--  <td class="px-6 py-4">
                    {{ $enfant->enfants->parents->user->name }}
                </td>  --}}
                <td class="px-6 py-4">
                    {{ $enfant->tarification->matiere->name }}
                </td>
                {{--  <td class="px-6 py-4">
                    {{ $enfant->repetiteur->user->name }}
                </td>  --}}
                <td class="px-6 py-4">
                    @if($enfant->status === 'En cours')
                        <span class="text-gray-500">{{ $enfant->status }}</span>
                    @elseif($enfant->status === 'Validé')
                        <span class="text-green-500">{{ $enfant->status }}</span>
                    @elseif($enfant->status === 'Non Validé')
                        <span class="text-red-500">{{ $enfant->status }}</span>
                    @else
                        {{ $enfant->status }}
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->motif }}
                </td>
                <td class="flex items-center px-6 py-4 space-x-3" >
                    @if ($enfant->status === 'En cours')
                        <a href="#" wire:click="edit({{ $enfant }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Valider</a>
                        {{-- Ajoutez ici le code pour le lien de suppression s'il est décommenté --}}
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <x-dialog-modal wire:model="showDeleteModal" maxWidth="2xl">
        <x-slot name="title">
            {{ $action }}
        </x-slot>

        <x-slot name="content">
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                {{ __('Êtes-vous sûr que vous souhaitez supprimer? Cette action est irréversible.') }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showDeleteModal', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteSelected" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="showEditModal" maxWidth="2xl">
        <x-slot name="title">
            {{ $action }}
        </x-slot>

        <x-slot name="content">



            <div class="mt-4">

                <label for="editing.enfants_id"
                    class="block mb-2 text-xl font-medium text-gray-900 ">ENFANTS</label>
                    @if(isset($editing['enfants_id']))
                    @foreach($enfants as $user)
                        @if($user->id == $editing['enfants_id'])
                            <input disabled type="text" value="{{ $user->fname  }} {{ $user->lname }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @endif
                    @endforeach
                @endif
                {{--  <select disabled id="editing.parents_id" wire:model.defer="editing.enfants_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option selected>Selectionnez enfant</option>
                    @foreach($enfants as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->fname }}  {{ $parent->lname }}</option>
                    @endforeach
                </select>  --}}


                <x-input-error for="editing.enfants_id" class="mt-2" />
            </div>
            <div class="mt-4 flex space-x-4">

               <div class="flex-1">

                <label for="editing.tarification_id" class="block mb-2 text-xl font-medium text-gray-900 ">CLASSE</label>
                @if(isset($editing['tarification_id']))
                @foreach($tarification as $user)
                    @if($user->id == $editing['tarification_id'])
                        <input disabled type="text" value="{{ $user->classe->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @endif
                @endforeach
            @endif


                <x-input-error for="editing.tarification_id" class="mt-2" />
               </div>
               <div class="flex-1">

                <label for="editing.tarification_id" class="block mb-2 text-xl font-medium text-gray-900 ">MATIERE</label>
                @if(isset($editing['tarification_id']))
                @foreach($tarification as $user)
                    @if($user->id == $editing['tarification_id'])
                        <input disabled type="text" value="{{ $user->matiere->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @endif
                @endforeach
            @endif

                <x-input-error for="editing.tarification_id" class="mt-2" />
               </div>
            </div>
            <div class="mt-4">

                <label for="editing.tarification_id" class="block mb-2 text-xl font-medium text-gray-900 ">TARIFICATION</label>
                @if(isset($editing['tarification_id']))
                @foreach($tarification as $user)
                    @if($user->id == $editing['tarification_id'])
                        <input disabled type="text" value="{{ $user->prix }}  FCFA" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @endif
                @endforeach
            @endif
                {{--  <select disabled id="editing.tarification_id" wire:model.defer="editing.tarification_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                    <option selected>Selectionnez la Tarification</option>
                    @foreach ($tarification as $matier)
                    <option value="{{ $matier->id }}">{{ $matier->prix }}</option>
                    @endforeach
                </select>  --}}


                <x-input-error for="editing.tarification_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.repetiteur_id" class="block mb-2 text-xl font-medium text-gray-900 ">REPETITEUR SOLLICITE</label>

                 @if(isset($editing['repetiteur_id']))
                            @foreach($repetiteurs as $matier)
                                @if($matier->id == $editing['repetiteur_id'])
                                    <input disabled type="text" value="{{ $matier->user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                @endif
                            @endforeach
                        @endif
                {{--  <select disabled id="editing.repetiteur_id" wire:model.defer="editing.repetiteur_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Selectionnez le repetiteur</option>
                    @foreach ($repetiteurs as $matier)
                    <option value="{{ $matier->id }}">{{ $matier->user->name }}</option>
                    @endforeach
                </select>  --}}


                <x-input-error for="editing.repetiteur_id" class="mt-2" />
            </div>
            {{--  <div class="mt-4">

                <label for="editing.status"
                    class="block mb-2 text-xl font-medium text-gray-900 ">TRAITER</label>
                <select id="editing.status" wire:model.defer="editing.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="En cours">Selectionner le status</option>
                    <option value="En cours">En cours</option>
                    <option value="Validé">Validé</option>
                    <option value="Non Validé">Non Validé</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>  --}}
            <div class="flex-1 mt-4">
                <label for="editing.status" class="block mb-2 text-xl font-medium text-gray-900">TRAITER</label>
                <div class="flex mt-1 ml-15">
                    <label class="inline-flex items-center mt-1 me-6">
                        <input id="en_cours" type="radio" class="form-radio h-5 w-5 text-blue-600" name="status" value="En cours" wire:model="editing.status">
                        <span class="ml-2 text-xl">En cours</span>
                    </label>
            
                    <label class="inline-flex items-center mt-1 me-6">
                        <input id="valide" type="radio" class="form-radio h-5 w-5 text-blue-600" name="status" value="Validé" wire:model="editing.status">
                        <span class="ml-2 text-xl">Validé</span>
                    </label>
            
                    <label class="inline-flex items-center mt-1 me-6">
                        <input id="non_valide" type="radio" class="form-radio h-5 w-5 text-blue-600" name="status" value="Non Validé" wire:model="editing.status">
                        <span class="ml-2 text-xl">Non Validé</span>
                    </label>
                </div>
                <x-input-error for="editing.status" class="mt-2" />
            </div>
            


            <div class="mt-4">
                {{--  <label for="editing.motif"
                class="block mb-2 text-xl font-medium text-gray-900 ">MOTIF</label>  --}}
                {{--  <x-input type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('Motif') }}" x-ref="editing.motif" wire:model.defer="editing.motif" />  --}}
                <textarea id="message" wire:model.defer="editing.motif" rows="2" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Motif" required></textarea>
                <x-input-error for="editing.motif" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showEditModal', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                {{ __('Traiter la demande') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>



