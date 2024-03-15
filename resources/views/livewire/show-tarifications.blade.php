
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <div class="flex items-center justify-between pb-4">

        <div class="">
            <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white">Liste des tarifications</label>

        </div>
        <div>
            <button wire:click="create" type="button"
                class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg
                    class="w-[14px] h-[14px] text-white dark:text-white mt-1 mr-2" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M9 1v16M1 9h16" />
                </svg>Ajouter</button>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    MATIERE
                </th>
                <th scope="col" class="px-6 py-3">
                    CLASSE
                </th>
                <th scope="col" class="px-6 py-3">
                    PRIX
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarification as $poste)
                <tr
                    class="bg-white text-lg border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $poste->matiere->name }}
                    </th>
                    <td class="px-6 py-4">
                         {{ $poste->classe->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $poste->prix }} FCFA
                   </td>

                    <td class="flex items-center px-6 py-4 space-x-3">
                        <a href="#" wire:click="edit({{ $poste }})" wire:loading.attr="disabled"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                        <a href="#" wire:click="delete({{ $poste }})" wire:loading.attr="disabled"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>
                    </td>
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
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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

                <label for="editing.matiere_id"
                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">MATIERE</label>
                <select id="editing.enfant_id" wire:model.defer="editing.matiere_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez une matiere</option>
                    @foreach($matiere as $enfant)
                    <option value="{{ $enfant->id }}">{{ $enfant->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.classe_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.classe_id"
                    class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">CLASSE</label>
                <select id="editing.classe_id" wire:model.defer="editing.classe_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez une classe</option>
                    @foreach($classe as $enfants)
                    <option value="{{ $enfants->id }}">{{ $enfants->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.classe_id" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="editing.prix"
                class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">ENTRER LE PRIX</label>
                <x-input type="number" class="mt-1 block w-full  text-xl" placeholder="{{ __('PRIX') }}" x-ref="editing.prix"
                    wire:model.defer="editing.prix" />

                <x-input-error for="editing.prix" class="mt-2" />
            </div>
            {{--  <div class="mt-4">

                <label for="editing.repetiteur_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REPETITEUR</label>
                <select id="editing.repetiteur_id" wire:model.defer="editing.repetiteur_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez le Répétiteur</option>
                    @foreach($repetiteurs as $repetiteur)
                    <option value="{{ $repetiteur->id }}">{{ $repetiteur->fname }}  {{ $repetiteur->lname }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.repetiteur_id" class="mt-2" />
            </div>  --}}

            {{--  <div class="mt-4">

                <label for="editing.user_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UTILISATEUR</label>
                <select id="editing.user_id" wire:model.defer="editing.user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez l'utilisateur </option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.user_id" class="mt-2" />
            </div>  --}}

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

