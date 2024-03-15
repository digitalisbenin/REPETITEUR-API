<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-4">
    <div class=" max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6 ">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/4  ">
                <div class="sticky top-0 z-50 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4  rounded-lg">
                        <img src="{{ $repetiteur->profil_imageUrl }}" alt=""
                            class="object-cover w-full lg:h-full rounded ">
                            <br>
                            <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Le Diplôme: </p>
                        <a class="text-blue-600 dark:text-green-300 text-xl" target="blank" href="{{ $repetiteur->diplome_imageUrl }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> La pièces d'identité: </p>
                        <a class="text-blue-600 dark:text-green-300 text-xl" target="blank" href="{{ $repetiteur->identite }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> L'attestation de résidence: </p>
                        <a class="text-blue-600 dark:text-green-300 text-xl" target="blank" href="{{ $repetiteur->attestationResidence }}">Télécharger</a>

                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Le casier judiciaire: </p>
                        <a class="text-blue-600 dark:text-green-300 text-xl" target="blank" href="{{ $repetiteur->casierJudiciaire }}">Télécharger</a>

                    </div>

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <span class="text-2xl font-medium text-black-500 dark:text-rose-200 ">Informations </span>
                    <div class="mb-8 ">

                         <span class="text-xl font-medium text-black-500 dark:text-rose-200"> Nom et prénoms: </span>
                        <p class=" text-3xl text-gray-700 dark:text-gray-400">
                            {{ $repetiteur->user->name}} </p>

                            <span class="text-xl font-medium text-black-500 dark:text-rose-200"> Commune: </span>
                            <p class=" text-gray-700 dark:text-gray-400 text-xl">
                                <span> {{ $repetiteur->commune->name }}</span>


                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Détails adresse: </p>
                        <p class=" text-gray-700 dark:text-gray-400 text-xl">
                            <span> {{ $repetiteur->adresse }}</span>

                        </p>
                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Téléphone: </p>
                        <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->phone }}</p>

                          <!-- Afficher le nom de la classe pour chaque produit -->

                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Heure de Disponibilité: </p>
                        <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->heureDisponibilite }}</p>



                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Matricule: </p>
                        <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->matricule }}</p>

                        <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Status: </p>
                        <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->status }}</p>


                        <span class="text-2xl font-medium text-black-500 dark:text-rose-200"> Description: </span>
                        <p class=" text-gray-700 dark:text-gray-400 text-xl">
                            {{  $repetiteur->description }}
                        </p>

                        <br>


                    </div>

                </div>
            </div>
            <div class="w-full px-4 md:w-1/4  ">
              <div class="sticky top-0 z-50 overflow-hidden ">
                  <div class="relative mb-6 lg:mb-10 lg:h-2/4  rounded-lg">
                     <span class="text-2xl font-medium text-black-500 dark:text-rose-200">Autres informations </span>
                    <br>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Situation matrimoniale: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->situationMatrimoniale }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Ecole de provenence: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->ecole }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Cycle: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->cycle }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Grade: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->grade }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Niveau d'etude: </p>
                    <p class="text-gray-600 dark:text-gray-300 text-xl">{{ $repetiteur->niveauEtude }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Status de l'enseignent </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->etats }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Evaluer par digitalis: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->evaluation }}</p>
                    <p class="text-xl font-medium text-black-500 dark:text-rose-200"> Expérience professionnel: </p>
                    <p class="text-gray-600 dark:text-green-300 text-xl">{{ $repetiteur->experience }}</p>
                  </div>

              </div>
          </div>
        </div>
    </div>

</div>



