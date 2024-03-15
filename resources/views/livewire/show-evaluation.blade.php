
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white">Liste des évaluations du répétiteurs</label>


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    N°
                </th>
                <th scope="col" class="px-6 py-3">
                    REPETITEUR
                </th>
                <th scope="col" class="px-6 py-3">
                    Note
                </th>
                <th scope="col" class="px-6 py-3">
                    PARENTS
                </th>

 {{--  <th scope="col" class="px-6 py-3">
                    Action
                </th>
                 --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluation as $keys => $enfant)
            <tr class=" text-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{  $keys +1 }}
                </th>
                <td class="px-6 py-4">
                    {{ $enfant->repetiteur->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->niveauEvaluation }}
                </td>
                <td class="px-6 py-4">
                    {{ $enfant->user->name }}
                </td>


                {{--  <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="#" wire:click="edit({{ $enfant }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>  --}}
                    {{--  <a href="#" wire:click="delete({{ $enfant }})" wire:loading.attr="disabled" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>  --}}
                {{--  </td>  --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <x-dialog-modal wire:model="showDeleteModal" maxWidth="md">
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

    <x-dialog-modal wire:model="showEditModal" maxWidth="md">
        <x-slot name="title">
            {{ $action }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('Nom') }}" x-ref="editing.fname" wire:model.defer="editing.fname" />

                <x-input-error for="editing.fname" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('PRENOM') }}" x-ref="editing.lname" wire:model.defer="editing.lname" />

                <x-input-error for="editing.lname" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('Classe') }}" x-ref="editing.classe" wire:model.defer="editing.classe" />

                <x-input-error for="editing.classe" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.status"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select id="editing.status" wire:model.defer="editing.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="En cours">Selectionner le status</option>
                    <option value="En cours">En cours</option>
                    <option value="Validé">Validé</option>
                    <option value="Non Validé">Non Validé</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('Motif') }}" x-ref="editing.motif" wire:model.defer="editing.motif" />

                <x-input-error for="editing.motif" class="mt-2" />
            </div>

            <div class="mt-4">

                <label for="editing.parents_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PARENTS</label>
                <select id="editing.parents_id" wire:model.defer="editing.parents_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez le Parents</option>

                </select>


                <x-input-error for="editing.parents_id" class="mt-2" />
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



