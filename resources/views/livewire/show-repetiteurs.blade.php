<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div class="flex items-center justify-between pb-4">
        <div style=" color:rgb(38, 205, 29);  padding:auto">
            @if (session()->has('message'))
            <div class="alert alert-success shadow-md" role="alert" >
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
          </div>
        <label for="table-search" class="sr-only"></label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                {{--  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>  --}}
            </div>

        </div>
        <div>
            <button wire:click="create" type="button" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg class="w-[14px] h-[14px] text-white dark:text-white mt-1 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 1v16M1 9h16" />
                </svg>Ajouter</button>
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    PRENOM
                </th>
                <th scope="col" class="px-6 py-3">
                    CLASSE
                </th>
                <th scope="col" class="px-6 py-3">
                    PHONE
                </th>
                <th scope="col" class="px-6 py-3">
                    ADRESSE
                </th>
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3">
                    DIPLOME
                </th>
                <th scope="col" class="px-6 py-3">
                    PROFIL
                </th>
                <th scope="col" class="px-6 py-3">
                    DESCRIPTION
                </th>
                <th scope="col" class="px-6 py-3">
                    DATE ET LIEU DE NAISSANCE
                </th>
                <th scope="col" class="px-6 py-3">
                    NIVEAU D ETUDE
                </th>
                <th scope="col" class="px-6 py-3">
                    SITUATION MATRIMONIALES
                </th>
                <th scope="col" class="px-6 py-3">
                    HEURE DE DISPONIBILITES
                </th>
                <th scope="col" class="px-6 py-3">
                    SEXE
                </th>
                <th scope="col" class="px-6 py-3">
                    ECOLE DE PROVENANCE
                </th>
                <th scope="col" class="px-6 py-3">
                    EXPERIENCE
                </th>

                <th scope="col" class="px-6 py-3">
                    MATIERE
                </th>
                <th scope="col" class="px-6 py-3">
                    UTILISATEUR
                </th>
                <th scope="col" class="px-6 py-3">
                    IDENTITE
                </th>
                <th scope="col" class="px-6 py-3">
                    CASIER JUDICIAIRES
                </th>
                <th scope="col" class="px-6 py-3">
                    ATTESTATION DE RESIDENCE
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repetiteurs as $repetiteur)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $repetiteur->fname }}
                </th>
                <td class="px-6 py-4">
                    {{ $repetiteur->lname }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->classe }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->phone }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->adresse }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->status }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ $repetiteur->diplome_imageUrl }}" target="_blank">Voir</a>
                    {{--  <embed src="{{ $repetiteur->diplome_imageUrl }}" type="application/pdf" width="90%" height="60px" />  --}}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ $repetiteur->profil_imageUrl }}" alt="" srcset="">
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->dateLieuNaissance }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->niveauEtude }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->situationMatrimoniale }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->heureDisponibilite }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->sexe }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->ecole }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->experience }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->matiere->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $repetiteur->user->name }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ $repetiteur->identite }}" target="_blank">Voir</a>
                    {{--  <embed src="{{ $repetiteur->diplome_imageUrl }}" type="application/pdf" width="90%" height="60px" />  --}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ $repetiteur->casierJudiciaire }}" target="_blank">Voir</a>
                    {{--  <embed src="{{ $repetiteur->diplome_imageUrl }}" type="application/pdf" width="90%" height="60px" />  --}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ $repetiteur->attestationResidence }}" target="_blank">Voir</a>
                    {{--  <embed src="{{ $repetiteur->diplome_imageUrl }}" type="application/pdf" width="90%" height="60px" />  --}}
                </td>


                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="#" wire:click="edit({{ $repetiteur }})" wire:loading.attr="disabled" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                    <a href="#" wire:click="delete({{ $repetiteur }})" wire:loading.attr="disabled" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>
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
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('TELEPHONE') }}" x-ref="editing.phone" wire:model.defer="editing.phone" />

                <x-input-error for="editing.phone" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('ADRESSE') }}" x-ref="editing.adresse" wire:model.defer="editing.adresse" />

                <x-input-error for="editing.adresse" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.sexe"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexe</label>
                <select id="editing.sexe" wire:model.defer="editing.sexe"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Homme">Selectionner le sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.diplome_imageUrl"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diplome</label>
                <x-input type="file" wire:model="pdffile" accept=".pdf" class="mt-1 block w-full"  />

                <x-input-error for="editing.diplome_imageUrl" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.identite"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pièces d identité</label>

                <x-input type="file" wire:model="pdffileidentite" accept=".pdf" class="mt-1 block w-full"/>

                <x-input-error for="editing.identite" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.casierJudiciaire"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Casier Judiciaire</label>
                <x-input type="file" wire:model="pdffilecasierJudiciaire" accept=".pdf" class="mt-1 block w-full" placeholder="{{ __('') }}" />

                <x-input-error for="editing.casierJudiciaire" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.attestationResidence"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation de résidence</label>
                <x-input type="file" wire:model="pdffileattestationResidence" accept=".pdf" class="mt-1 block w-full" placeholder="{{ __('') }}"/>

                <x-input-error for="editing.attestationResidence" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="editing.profil_imageUrl"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo complète</label>
                <x-input type="file" wire:model="file" id="file" name="file"  class="mt-1 block w-full" placeholder="{{ __('PROFIL') }}" x-ref="editing.profil_imageUrl" />
                <x-input-error for="editing.profil_imageUrl" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('GRADE') }}" x-ref="editing.grade" wire:model.defer="editing.grade" />
                <x-input-error for="editing.grade" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('ECOLE DE PROVENANCE') }}" x-ref="editing.ecole" wire:model.defer="editing.ecole" />

                <x-input-error for="editing.ecole" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('EXPERIENCE') }}" x-ref="editing.experience" wire:model.defer="editing.experience" />

                <x-input-error for="editing.experience" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="editing.dateLieuNaissance"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date et lieu de naissance</label>
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('EX: 20/10/1990/Cotonou') }}" x-ref="editing.dateLieuNaissance" wire:model.defer="editing.dateLieuNaissance" />

                <x-input-error for="editing.dateLieuNaissance" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('SITUATION MATRIMONIALE') }}" x-ref="editing.situationMatrimoniale" wire:model.defer="editing.situationMatrimoniale" />

                <x-input-error for="editing.situationMatrimoniale" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('NIVEAU D ETUDE') }}" x-ref="editing.niveauEtude" wire:model.defer="editing.niveauEtude" />

                <x-input-error for="editing.niveauEtude" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('HEURE DE DISPONIBILITES') }}" x-ref="editing.heureDisponibilite" wire:model.defer="editing.heureDisponibilite" />
                <x-input-error for="editing.heureDisponibilite" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('DESCRIPTION') }}" x-ref="editing.description" wire:model.defer="editing.description" />

                <x-input-error for="editing.description" class="mt-2" />
            </div>

            <div class="mt-4">

                <label for="editing.status"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select id="editing.status" wire:model.defer="editing.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="En cours">Selectionner le status</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminer">Terminer</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>

            <div class="mt-4">

                <label for="editing.user_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisateur</label>
                <select id="editing.user_id" wire:model.defer="editing.user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez un utilisateur</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.user_id" class="mt-2" />
            </div>
            <div class="mt-4">

                <label for="editing.matiere_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MATIERE</label>
                <select id="editing.matiere_id" wire:model.defer="editing.matiere_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selectionnez la matiere</option>
                    @foreach ($matiere as $matier)
                    <option value="{{ $matier->id }}">{{ $matier->name }}</option>
                    @endforeach
                </select>


                <x-input-error for="editing.matiere_id" class="mt-2" />
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


