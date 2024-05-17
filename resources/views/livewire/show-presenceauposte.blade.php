<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
        <div style=" color:rgb(38, 205, 29);  padding:auto" class="mx-auto text-xl mb-3">
            @if (session()->has('message'))
                <div class="alert alert-success shadow-md" role="alert">
                    <h4>{{ session('message') }}</h4>
                </div>
            @endif
            @if ($errorMessage)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erreur !</strong>
                <span class="block sm:inline">{{ $errorMessage }}</span>
            </div>
        @endif
        </div>
        <div class="flex justify-between pb-4">


            <div class="">

                <label for="table-search" class="block mb-2 text-3xl font-medium uppercase  text-gray-900 "> Présence au poste</label>
            </div>
            <div>
                <button wire:click="create" type="button"
                    class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2"><svg
                        class="w-[14px] h-[14px] text-white  mt-1 mr-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M9 1v16M1 9h16" />
                    </svg>Initialiser la présence au poste </button>
            </div>

        </div>
       <div class="flex items-center justify-between mb-4">
        {{--  <div class=" ">
            <label for=""
                        class="block mb-2 text-xl font-medium text-gray-900  text-center">Paiement éffectuée sur une periode:</label>
            <form wire:submit.prevent="render" method="post" class="flex items-center mx-3">


               <button  type="submit"
             class="inline-flex mx-3 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-blue-300
             font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
              focus:outline-none dark:focus:ring-blue-800"></button>  -
            </form>
        </div>  --}}

       </div>

        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-lg text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        N°
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Répetiteur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mois
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>


                    <th scope="col" class="px-6 py-3">
                        Présence
                    </th>



                    <th scope="col" class="px-6 py-3">
                        Observation
                    </th>


                    {{--  <th scope="col" class="px-6 py-3">
                        PHONE
                    </th>  --}}


                    {{--  <th scope="col" class="px-6 py-3">
                        Action
                    </th>  --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($presenceauposte as $keys => $payement)
                    <tr
                        class=" text-lg bg-white border-b  hover:bg-gray-50 ">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $keys + 1 }}
                        </th>
                        {{--  <td class="px-6 py-4">
                        {{ $payement->date }}
                    </td>  --}}
                    <td class="px-6 py-4">
                        {{ $payement->repetiteur->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $payement->mois}}
                    </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($payement->datee)->format('d-m-Y') }}
                        </td>


                        <td class="px-6 py-4">
                            {{ $payement->poste}}

                        </td>



                        <td class="px-6 py-4">
                            {{ $payement->message }}
                        </td>


                        {{--  <td class="px-6 py-4">
                        {{ $payement->phone }}
                    </td>  --}}



                        {{--  <td class="flex items-center px-6 py-4 space-x-3">
                        <a href="#" wire:click="edit({{ $payement }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                        <a href="#" wire:click="delete({{ $payement }})" wire:loading.attr="disabled" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>
                    </td>  --}}
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
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
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
                {{--  <div class="mt-4">
                    <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('Nom') }}" x-ref="editing.name" wire:model.defer="editing.name" />

                    <x-input-error for="editing.name" class="mt-2" />
                </div>  --}}

                <div class="mt-4">

                    <label for="editing.mois"
                        class="block mb-2 text-xl font-medium text-gray-900 ">MOIS</label>
                    <select id="editing.mois" wire:model.defer="editing.mois"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="Janvier">Selectionner le mois</option>
                        <option value="Janvier">Janvier</option>
                        <option value="Fevrier">Fevrier</option>
                        <option value="Mars">Mars</option>
                        <option value="Avril">Avril</option>
                        <option value="Mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Aout">Aout</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Decembre">Decembre</option>

                    </select>
                    <x-input-error for="editing.mois" class="mt-2" />
                </div>
                {{--  <div class="mt-4">
                    <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('REFERENCE') }}" x-ref="editing.reference"  />

                    <x-input-error for="editing.reference" class="mt-2" />
                </div>  --}}
                <div class="mt-4">

                    <label for="editing.datee"
                        class="block mb-2 text-xl font-medium text-gray-900 ">DATE</label>
                    <x-input type="date" class="mt-1 block w-full text-xl"
                        placeholder="{{ __('EX: 2014-05-09 00:20:51') }}" x-ref="editing.datee"
                        wire:model.defer="editing.datee" />

                    <x-input-error for="editing.datee" class="mt-2" />
                </div>
                {{--  <div class="mt-4">
                    <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('TELEPHONE') }}" x-ref="editing.phone" wire:model.defer="editing.phone" />

                    <x-input-error for="editing.phone" class="mt-2" />
                </div>  --}}
                {{--  <div class="mt-4">

                    <label for="editing.status"
                        class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">STATUS</label>
                    <select id="editing.status" wire:model.defer="editing.status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Impayer">Selectionner le status</option>
                        <option value="Impayer">Impayer</option>
                        <option value="Payer">Payer</option>

                    </select>
                    <x-input-error for="editing.status" class="mt-2" />
                </div>  --}}
                {{--  <div class="mt-4">
                    <label for="editing.annee"
                        class="block mb-2 text-xl font-medium text-gray-900 ">ANNEE</label>
                    <x-input type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('ANNEE') }}"
                        x-ref="editing.annee" wire:model.defer="editing.annee" />

                    <x-input-error for="editing.annee" class="mt-2" />
                </div>  --}}

                {{--  <div class="mt-4">

                    <label for="editing.demande_id"
                        class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">DEMANDE</label>
                    <select id="editing.demande_id" wire:model.defer="editing.demande_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selectionnez la demande</option>  --}}
                {{--  @foreach ($demande as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->enfants->fname }}  {{ $parent->enfants->lname }}</option>
                        @endforeach  --}}
                {{--  @foreach ($demande as $parent)
                            @if ($parent->status === 'Validé')
                                <option value="{{ $parent->id }}">{{ $parent->enfants->fname }} {{ $parent->enfants->lname }}</option>
                            @endif
                        @endforeach

                    </select>


                    <x-input-error for="editing.demande_id" class="mt-2" />
                </div>  --}}
                {{--  <div class="mt-4">

                    <label for="editing.matiere_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MATIERE</label>
                    <select id="editing.matiere_id" wire:model.defer="editing.matiere_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selectionnez la matiere</option>
                        @foreach ($matiere as $matier)
                        <option value="{{ $matier->id }}">{{ $matier->name }}</option>
                        @endforeach
                    </select>


                    <x-input-error for="editing.matiere_id" class="mt-2" />
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




</div>

