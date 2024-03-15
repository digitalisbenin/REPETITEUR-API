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
            <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white"> Liste des librairies partenaires</label>


        </div>
        <div>
            <button wire:click="create" type="button" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg class="w-[14px] h-[14px] text-white dark:text-white mt-1 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 1v16M1 9h16" />
                </svg>Ajouter</button>
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>

                <th scope="col" class="px-6 py-3">
                    Image
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($librairie as $epreuve)
            <tr class="text-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $epreuve->name }}
                </th>
                <td class="px-6 py-4">

              {{ $epreuve->description }}

                </td>
                      <td class="px-6 py-4">

                        <img src="{{ $epreuve->librairieUrl }}"alt="" width="60px" >

                          </td>




                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="#" wire:click="edit({{ $epreuve }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                    <a href="#" wire:click="delete({{ $epreuve }})" wire:loading.attr="disabled" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <x-dialog-modal wire:model="showDeleteModal" maxWidth="lg">
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
                <label for="editing.name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">NOM DE LA LIBRAIRIE</label>
                <x-input type="text" class="mt-1 block w-full text-xl my-5" placeholder="{{ __('NOM') }}" x-ref="editing.name" wire:model.defer="editing.name" />

                <x-input-error for="editing.name" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.librairieUrl" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">ENTRER UNE IMAGE</label>
                <x-input type="file" wire:model="file" id="file" class=" my-5 mt-1 block w-full text-xl" placeholder="{{ __('IMAGE') }}"  />

                <x-input-error for="editing.librairieUrl" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.descri" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">DESCRIPTION</label>
                <textarea id="message" wire:model.defer="editing.descri" rows="4" x-ref="editing.descri" class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message" required></textarea>


                <x-input-error for="editing.descri" class="mt-2" />
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





