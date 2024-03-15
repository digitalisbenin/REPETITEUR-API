<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white">Messagerie</label>


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom Complet
                </th>
                <th scope="col" class="px-6 py-3">
                    Téléphone
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    message
                </th>
                <th scope="col" class="px-6 py-3">
                    Reponse Admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($message as $epreuve)
            <tr class="text-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $epreuve->name }}
                </th>
                <td class="px-6 py-4">

              {{ $epreuve->phone }}

                </td>
                <td class="px-6 py-4">

                    {{ $epreuve->email }}

                      </td>
                <td class="px-6 py-4">

                  {{ $epreuve->message }}

                      </td>

                      <td class="px-6 py-4">

                        {{ $epreuve->reponse_admin }}

                            </td>






                <td class=flex items-center px-6 py-4 space-x-3>
                    @if ($epreuve->reponse_admin == '')
                        <a href="#" wire:click="edit({{ $epreuve }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Répondre</a>
                    @endif

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
            <div class="mt-4 text-2xl">
                <label for="editing.message"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Message</label>
                <x-input disabled type="text" readonly class="mt-1 block w-full text-xl" placeholder="{{ __('MESSAGE') }}" x-ref="editing.name" wire:model.defer="editing.message" />

                <x-input-error for="editing.message" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="editing.reponse_admin"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Votre Réponse</label>
                <textarea id="message" wire:model.defer="editing.reponse_admin" rows="4" class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message" required></textarea>


                <x-input-error for="editing.reponse_admin" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class=" text-lg" wire:click="$set('showEditModal', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3 text-lg" wire:click="save" wire:loading.attr="disabled">
                {{ __('Enregistrer') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>





