
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </div>
    <label for="table-search" class="block mb-2 text-3xl font-medium text-gray-900 dark:text-white">Appréciations</label>
   
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    APPRECIATION sur Répétiteur
                </th>
                <th scope="col" class="px-6 py-3">
                    APPRECIATION sur un enfant
                </th>
                <th scope="col" class="px-6 py-3">
                    PRESENCE AU POSTE
                </th>
                {{--  <th scope="col" class="px-6 py-3">
                    Nom de l'enfant
                </th>  --}}
                <th scope="col" class="px-6 py-3">
                    PARENTS
                </th>
                <th scope="col" class="px-6 py-3">
                    REPETITEUR
                </th>
                <th scope="col" class="px-6 py-3">
                    Réponse Parents
                </th>
                <th scope="col" class="px-6 py-3">
                    Réponse Admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postes as $poste)
                <tr
                    class="text-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 ">
                        {{ $poste->appreciation_parents }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $poste->appreciation_repetiteur }}
                    </th>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($poste->poste)->format('d-m-Y') }}

                    </td>
                    {{--  <td class="px-6 py-4">
                        {{ $poste->demande->enfants->fname }}   {{ $poste->demande->enfants->lname }}
                   </td>  --}}
                   <td class="px-6 py-4">
                    {{ $poste->demande->enfants->parents->user->name }}
               </td>
               <td class="px-6 py-4">
                {{ $poste->demande->repetiteur->user->name }}
           </td>
           <td class="px-6 py-4">
            {{ $poste->reponse_parents }}
       </td>
       <td class="px-6 py-4">
        {{ $poste->reponse_admin }}
   </td>
   <td class="flex items-center px-6 py-4 space-x-3" >
    @if ($poste->reponse_admin == '' && $poste->appreciation_parents!='')
        <a href="#" wire:click="edit({{ $poste }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Répondre</a>
        {{-- Ajoutez ici le code pour le lien de suppression s'il est décommenté --}}
    @endif
</td>



                    {{--  <td class="flex items-center px-6 py-4 space-x-3">
                        <a href="#" wire:click="edit({{ $poste }})" wire:loading.attr="disabled"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Répondre</a>  --}}
                        {{--  <a href="#" wire:click="delete({{ $poste }})" wire:loading.attr="disabled"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>  --}}
                    {{--  </td>  --}}
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
            <div class="mt-4 text-xl">

                <label for="editing.appreciation_parents"
                    class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Apprécitions du parents</label>
                    <x-input disabled type="text" readonly class="mt-1 block w-full text-xl" placeholder="{{ __('Appréciations du parents') }}" x-ref="editing.appreciation_parents"
                    wire:model.defer="editing.appreciation_parents" />


                <x-input-error for="editing.appreciation_parents" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.reponse_admin"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Votre Réponse</label>
                <textarea id="message" wire:model.defer="editing.reponse_admin" rows="4" class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Message" required></textarea>
                {{--  <x-input type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('REPONSE ADMIN') }}" x-ref="editing.content"
                    wire:model.defer="editing.reponse_admin" />  --}}

                <x-input-error for="editing.reponse_admin" class="mt-2" />
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
