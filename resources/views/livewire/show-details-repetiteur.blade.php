<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div class=" max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6 ">
        <div class="flex justify-between"> 
            @if(!empty($repetiteur->profil_imageUrl))
            <img src="{{ $repetiteur->profil_imageUrl }}" alt="" class="object-cover lg:h-64 rounded ">
        @else
            <img src="{{ asset('image/vectoriel.jpg') }}" alt="" class="object-cover lg:h-64 rounded ">
        @endif

            <div>@if ($repetiteur->traitementDossiers === 'En cours')

                <button wire:click="edit({{ $repetiteur }})" type="button" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2  ">
                    Traiter</button>
                  {{--  <x-secondary-button wire:click="edit({{ $repetiteur }})" wire:loading.attr="disabled" class="  ">{{('Traiter')}}</x-secondary-button>  --}}
                      
                  @endif</div>
            
        </div>
        <div class="relative mb-6 lg:mb-10 lg:h-2/4  rounded-lg">
       

            

    
            
       
      {{--  <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/4  ">
                <div class="sticky top-0 z-50 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4  rounded-lg">
                        @if(!empty($repetiteur->profil_imageUrl))
                            <img src="{{ $repetiteur->profil_imageUrl }}" alt="" class="object-cover w-full lg:h-full rounded ">
                        @else
                            <img src="{{ asset('image/vectoriel.jpg') }}" alt="" class="object-cover w-full lg:h-full rounded ">
                        @endif

                            <br>
                            <p class="text-xl font-medium text-black-500 "> Le Diplôme: </p>
                        <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->diplome_imageUrl }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 "> La pièces d'identité: </p>
                        <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->identite }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 "> L'attestation de résidence: </p>
                        <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->attestationResidence }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 "> Le casier judiciaire: </p>
                        <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->casierJudiciaire }}">Télécharger</a>

                    </div>

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <span class="text-2xl font-medium text-black-500  ">Informations </span>
                    <div class="mb-8 ">

                         <span class="text-xl font-medium text-black-500 "> Nom et prénoms: </span>
                        <p class=" text-3xl text-gray-700">
                            {{ $repetiteur->user->name}} </p>

                            <span class="text-xl font-medium text-black-500 "> Commune: </span>
                            <p class=" text-gray-700 text-xl">
                                <span> {{ $repetiteur->commune->name }}</span>


                        <p class="text-xl font-medium text-black-500 "> Détails adresse: </p>
                        <p class=" text-gray-700 text-xl">
                            <span> {{ $repetiteur->adresse }}</span>

                        </p>
                        <p class="text-xl font-medium text-black-500 "> Téléphone: </p>
                        <p class="text-gray-600  text-xl">{{ $repetiteur->phone }}</p>

                          <!-- Afficher le nom de la classe pour chaque produit -->

                        <p class="text-xl font-medium text-black-500 "> Heure de Disponibilité: </p>
                        <p class="text-gray-600  text-xl">{{ $repetiteur->heureDisponibilite }}</p>



                        <p class="text-xl font-medium text-black-500 "> Matricule: </p>
                        <p class="text-gray-600  text-xl">{{ $repetiteur->matricule }}</p>

                        <p class="text-xl font-medium text-black-500 "> Status: </p>
                        <p class="text-gray-600  text-xl">{{ $repetiteur->status }}</p>


                        <span class="text-2xl font-medium text-black-500 "> Description: </span>
                        <p class=" text-gray-700 text-xl">
                            {{  $repetiteur->description }}
                        </p>

                        <br>


                    </div>

                </div>
            </div>
            <div class="w-full px-4 md:w-1/4  ">
              <div class="sticky top-0 z-50 overflow-hidden ">
                @if ($repetiteur->traitementDossiers === 'En cours')

                <button wire:click="edit({{ $repetiteur }})" type="button" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2  ">
                    Traiter</button>
                    <x-secondary-button wire:click="edit({{ $repetiteur }})" wire:loading.attr="disabled" class="  ">{{('Traiter')}}</x-secondary-button>  
                      
                  @endif
                  <div class="relative mb-6 lg:mb-10 lg:h-2/4  rounded-lg">
                     <span class="text-2xl font-medium text-black-500 ">Autres informations </span>
                    <br>
                    <p class="text-xl font-medium text-black-500 "> Situation matrimoniale: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->situationMatrimoniale }}</p>
                    <p class="text-xl font-medium text-black-500 "> Ecole de provenence: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->ecole }}</p>
                    <p class="text-xl font-medium text-black-500 "> Cycle: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->cycle }}</p>
                    <p class="text-xl font-medium text-black-500 "> Grade: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->grade }}</p>
                    <p class="text-xl font-medium text-black-500 "> Niveau d'etude: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->niveauEtude }}</p>
                    <p class="text-xl font-medium text-black-500 "> Status de l'enseignent </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->etats }}</p>
                    <p class="text-xl font-medium text-black-500 "> Evaluer par digitalis: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->evaluation }}</p>
                    <p class="text-xl font-medium text-black-500 "> Expérience professionnel: </p>
                    <p class="text-gray-600  text-xl">{{ $repetiteur->experience }}</p>
                  </div>

              </div>
          </div>
        </div> 
    </div>  --}}

 <x-dialog-modal wire:model="showEditModal" maxWidth="2xl">
        <x-slot name="title" class="text-2xl">
            {{ $action }}
        </x-slot>

        <x-slot name="content">
            {{--  <div class="mt-4">
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
                <x-input-error for="editing.sexe" class="mt-2" />
             </div>  --}}
            {{-- <div class="mt-4">
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
            </div>  --}}
            {{--  <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('GRADE') }}" x-ref="editing.grade" wire:model.defer="editing.grade" />
                <x-input-error for="editing.grade" class="mt-2" />
            </div>  --}}
            {{--  <div class="mt-4">
                <x-input disabled type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('ECOLE DE PROVENANCE') }}" x-ref="editing.ecole" wire:model.defer="editing.ecole" />

                <x-input-error for="editing.ecole" class="mt-2" />
            </div>  --}}
            {{--  <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('EXPERIENCE') }}" x-ref="editing.experience" wire:model.defer="editing.experience" />

                <x-input-error for="editing.experience" class="mt-2" />
            </div>  --}}

            {{--  <div class="mt-4">
                <label for="editing.dateLieuNaissance"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date et lieu de naissance</label>
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('EX: 20/10/1990/Cotonou') }}" x-ref="editing.dateLieuNaissance" wire:model.defer="editing.dateLieuNaissance" />

                <x-input-error for="editing.dateLieuNaissance" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('SITUATION MATRIMONIALE') }}" x-ref="editing.situationMatrimoniale" wire:model.defer="editing.situationMatrimoniale" />

                <x-input-error for="editing.situationMatrimoniale" class="mt-2" />
            </div>  --}}

            {{--  <div class="mt-4">
                <x-input type="text" class="mt-1 block w-full" placeholder="{{ __('NIVEAU D ETUDE') }}" x-ref="editing.niveauEtude" wire:model.defer="editing.niveauEtude" />

                <x-input-error for="editing.niveauEtude" class="mt-2" />
            </div>  --}}

            {{--  <div class="mt-4">
                <x-input disabled  type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('HEURE DE DISPONIBILITES') }}" x-ref="editing.heureDisponibilite" wire:model.defer="editing.heureDisponibilite" />
                <x-input-error for="editing.heureDisponibilite" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input disabled type="text" class="mt-1 block w-full text-xl" placeholder="{{ __('DESCRIPTION') }}" x-ref="editing.description" wire:model.defer="editing.description" />

                <x-input-error for="editing.description" class="mt-2" />
            </div>  --}}



            {{--  <div class="mt-4">

                <label for="editing.user_id"
                    class="block mb-2 text-xl font-medium text-gray-900 ">Utilisateur</label><div class="mt-4">

                        @if(isset($editing['user_id']))
                            @foreach($users as $user)
                                @if($user->id == $editing['user_id'])
                                    <input disabled type="text" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                @endif
                            @endforeach
                        @endif  --}}
                        {{--  @foreach($users as $user)
                        @if($user->id == $editing['user_id'])
                            <input disabled type="text" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @endif
                    @endforeach  --}}

                {{--  <select disabled id="editing.user_id" wire:model.defer="editing.user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Selectionnez un utilisateur</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>  --}}


                {{--  <x-input-error for="editing.user_id" class="mt-2" />
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

            <div class="mt-4">

                <label for="editing.status"
                    class="block mb-2 text-xl font-medium text-gray-900 ">STATUS</label>
                <select id="editing.status" wire:model.defer="editing.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    {{--  <option value="Etudiants">Selectionner le status</option>  --}}
                    <option value="Etudiants">Etudiants</option>
                    <option value="Professionnel">Professionnel</option>
                    <option value="Enseignant">Enseignant</option>
                    <option value="Enseignant certifier">Enseignant certifier</option>
                </select>
                <x-input-error for="editing.status" class="mt-2" />
            </div>

            <div class="mt-4 flex space-x-4">
                <div class="flex-1">
                    <label for="editing.traitementDossiers" class="block mb-2 text-xl font-medium text-gray-900">TRAITEMENT DE DOSSIERS</label>
                    <div class="flex mt-1">
                        <label class="inline-flex items-center mt-1 me-6">
                            <input id="en_cours" type="radio" class="form-radio h-5 w-5 text-blue-600" name="traitementDossiers" value="En cours" wire:model="editing.traitementDossiers">
                            <span class="ml-2 text-xl">En cours</span>
                        </label>
                
                        <label class="inline-flex items-center mt-1 me-6">
                            <input id="valide" type="radio" class="form-radio h-5 w-5 text-blue-600" name="traitementDossiers" value="Validé" wire:model="editing.traitementDossiers">
                            <span class="ml-2 text-xl">Validé</span>
                        </label>
                
                        <label class="inline-flex items-center mt-1 me-6">
                            <input id="non_valide" type="radio" class="form-radio h-5 w-5 text-blue-600" name="traitementDossiers" value="Non Validé" wire:model="editing.traitementDossiers">
                            <span class="ml-2 text-xl">Non Validé</span>
                        </label>
                    </div>
                </div>
                

               {{--  <div class="flex-1">
                <label for="editing.traitementDossiers"
                class="block mb-2 text-xl font-medium text-gray-900 ">Traitement de dossiers</label>
            <select id="editing.traitementDossiers" wire:model.defer="editing.traitementDossiers"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                  <option value="">Selectionner le status</option>
                <option value="En cours">En cours</option>
                <option value="Validé">Validé</option>
                <option value="Non Validé">Non Validé</option>
            </select>
            <x-input-error for="editing.traitementDossiers" class="mt-2" />
               </div>  --}}

               {{--  <div class="flex-1  ">
                <label for="editing.traitementDossiers"
                class="block mb-2 text-xl font-medium text-gray-900 ">Traitement de dossiers</label>
                <div class="flex mt-1">
                    <label class="inline-flex items-center mt-1 me-6">
                        <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="gender" value="En cours" @if(isset($editing['traitementDossiers']) && $editing['traitementDossiers'] === "En cours") checked @endif>
                        <span class="ml-2 text-xl">En cours</span>
                        
                    </label>

                    <label class="inline-flex items-center mt-1 me-6">
                        <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="gender" value="Validé" @if(isset($editing['traitementDossiers']) && $editing['traitementDossiers'] === "Validé") checked @endif>
                        <span class="ml-2 text-xl">Validé</span>
                    </label>
                    <label class="inline-flex items-center mt-1 me-6">
                      <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="gender" value="Non Validé" @if(isset($editing['traitementDossiers']) && $editing['traitementDossiers'] == "Non Validé") checked @endif>
                      <span class="ml-2 text-xl">Non Validé</span>
                  </label>
                </div>  --}}

                {{--  <div class="flex mt-10">
                     @if(isset($editing['traitementDossiers']))

                        @if($editing['traitementDossiers']==="En cours")
                        <label class="inline-flex items-center mt-3 me-3">
                            <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="gender" value="male" selected>
                            <span class="ml-2">Non Traité</span>
                        </label>

                        @else
                        <label class="inline-flex items-center mt-3 me-3">
                            <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="gender" value="male"selected >
                            <span class="ml-2">Non Traité</span>
                        </label>

                        @endif
                      @endif


                  </div>  --}}

               {{--  </div>  --}}
            </div>

            <div class="mt-4">
                <div class="flex space-x-4">

                    <div class=" flex-1">
                         <label for="editing.evaluation"
                        class="block mb-2 text-xl font-medium text-gray-900 ">CERTIFICATION</label>
                    <select id="editing.evaluation" wire:model.defer="editing.evaluation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="Non Evaluer">un certification de digitalis</option>
                        <option value="Non Evaluer">Non Evaluer</option>
                        <option value="Evaluer">Evaluer</option>
                    </select>
                    <x-input-error for="editing.evaluation" class="mt-2" /></div>

                   <div class="flex-1">
                    <label for="editing.notes"
                    class="block mb-2 text-xl font-medium text-gray-900 ">NOTES</label>

                     <x-input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{ __('NOTES') }}" x-ref="editing.notes" wire:model.defer="editing.notes" />

                    <x-input-error for="editing.notes" class="mt-2" />

                </div>
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showEditModal', false)" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                {{ __('Traiter') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>


    

       
       
      
       
      <div class=" mx-10">
        <table class="w-full table-responsive text-sm text-left text-gray-500">
            <thead class="text-xl text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center " colspan="2">
                        Informations Personnels
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white text-lg border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        Nom Complet
                    </th>
                    <td class="px-6 py-4">
                      {{ $repetiteur->user->name}}
                    </td>
                    
                </tr>
                <tr class="bg-white text-lg border-b ">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                      Commune
                  </th>
                  <td class="px-6 py-4">
                    {{ $repetiteur->commune->name}}
                  </td>
                  
              </tr>
              <tr class="bg-white text-lg border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    Détail adresse
                </th>
                <td class="px-6 py-4">
                  {{ $repetiteur->adresse}}
                </td>
                
            </tr>
            <tr class="bg-white text-lg border-b ">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                  Situation Familiale
              </th>
              <td class="px-6 py-4">
                {{ $repetiteur->situationMatrimoniale }}
              </td>
    
            
              
          </tr>
        </tbody>
        </table>
          <table class="table-responsive w-full text-sm text-left  text-gray-500">
            <thead class="text-xl text-gray-700 uppercase bg-gray-100 ">
              <tr>
                  <th scope="col" class="px-6 py-3 text-center " colspan="2">
                      Informations Générals
                  </th>
                  
              </tr>
          </thead>
          
          <tr class="bg-white text-lg border-b ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                Matricule
            </th>
            <td class="px-6 py-4">
              {{ $repetiteur->matricule }}
            </td>
            
        </tr>
        <tr class="bg-white text-lg border-b ">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
              Classe
          </th>
          <td class="px-6 py-4">
            {{--  {{ products.map(product => product.classe.name).join(', ') }}  --}}
            @foreach($repetiteur->matieresClasses as $matiereClasse)
            {{ $matiereClasse->classe->name }}

     @endforeach
          </td>
          
      </tr>
      <tr class="bg-white text-lg border-b ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            Matiere
        </th>
        <td class="px-6 py-4">
          {{--  {{ products.map(product => product.matiere.name).join(', ') }}  --}}
          @foreach($repetiteur->matieresClasses as $matiereClasse)
          {{ $matiereClasse->matiere->name }}

   @endforeach
        </td>
        
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
          Heure de disponibilités
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->heureDisponibilite }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
          Statut
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->status }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
          Description
      </th>
      <td class="px-6 py-4">
        {{  $repetiteur->description }}
      </td>
      
    </tr>
    </table>
    <table class="w-full table-responsive text-sm text-left text-gray-500">
      <thead class="text-xl text-gray-700 uppercase bg-gray-100 ">
        <tr>
            <th scope="col" class="px-6 py-3 text-center" colspan="2" >
                Autres informations
            </th>
            
        </tr>
    </thead>
    
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Ecole de provenence
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->ecole }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Cycle
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->cycle}}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Grade
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->grade }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Niveau d'etude
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->niveauEtude }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Status de l'enseignent
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->etats }}
      </td>
      
    </tr><tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Evaluer par digitalis
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->evaluation }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Expérience professionnel
      </th>
      <td class="px-6 py-4">
        {{ $repetiteur->experience }}
      </td>
      
    </tr>
    <tr class="bg-white text-lg border-b ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            Le Diplôme:
        </th>
        <td class="px-6 py-4">
            <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->diplome_imageUrl }}">Télécharger</a>
        </td>
        
      </tr> 
      <tr class="bg-white text-lg border-b ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            La pièces d'identité:
        </th>
        <td class="px-6 py-4">
            <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->identite }}">Télécharger</a>
        </td>
        
      </tr>
      <tr class="bg-white text-lg border-b ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            L'attestation de résidence:
        </th>
        <td class="px-6 py-4">
            <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->attestationResidence }}">Télécharger</a>
        </td>
        
      </tr>
      <tr class="bg-white text-lg border-b ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
            Le casier judiciaire:
        </th>
        <td class="px-6 py-4">
            <a class="text-blue-600 text-xl" target="blank" href="{{ $repetiteur->casierJudiciaire }}">Télécharger</a>
        </td>
        
      </tr>



           
        </table>
    
       
    </div>
</div>



