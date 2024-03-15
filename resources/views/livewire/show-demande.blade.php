
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white">Liste des demandes</label>


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom et  PRENOM
                </th>
                <th scope="col" class="px-6 py-3">
                    CLASSE
                </th>
                <th scope="col" class="px-6 py-3">
                    PARENTS
                </th>
                <th scope="col" class="px-6 py-3">
                    MATIERE
                </th>
                <th scope="col" class="px-6 py-3">
                    REPETITEUR
                </th>
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
            @foreach ($demande as $enfant)
            <tr class="text-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $enfant->enfants->fname }}  {{ $enfant->enfants->lname }}
                </th>

                <td class="px-6 py-4">
                    {{ $enfant->tarification->classe->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->enfants->parents->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->tarification->matiere->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->repetiteur->user->name }}
                </td>
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
                        <a href="#" wire:click="edit({{ $enfant }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Validé/Invalidé</a>
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
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
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
                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">ENFANTS</label>
                <select disabled id="editing.parents_id" wire:model.defer="editing.enfants_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez enfant</option>
                    @foreach($enfants as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->fname }}  {{ $parent->lname }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.enfants_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.tarification_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">TARIFICATION</label>
                <select disabled id="editing.tarification_id" wire:model.defer="editing.tarification_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez la Tarification</option>
                    @foreach ($tarification as $matier)
                    <option value="{{ $matier->id }}">{{ $matier->prix }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.tarification_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.repetiteur_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">REPETITEUR</label>
                <select disabled id="editing.repetiteur_id" wire:model.defer="editing.repetiteur_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez le repetiteur</option>
                    @foreach ($repetiteurs as $matier)
                    <option value="{{ $matier->id }}">{{ $matier->user->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.repetiteur_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.status"
                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">STATUS</label>
                <select id="editing.status" wire:model.defer="editing.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="En cours">Selectionner le status</option>
                    <option value="En cours">En cours</option>
                    <option value="Validé">Validé</option>
                    <option value="Non Validé">Non Validé</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>



            <div class="mt-4">
                <label for="editing.motif"
                class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">MOTIF</label>
                <x-input type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('Motif') }}" x-ref="editing.motif" wire:model.defer="editing.motif" />

                <x-input-error for="editing.motif" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showEditModal', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                {{ __('Enregistrer') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>



