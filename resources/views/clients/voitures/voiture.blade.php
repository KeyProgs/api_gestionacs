<div class="p-3 mb-2 bg-gradient-gray  row  form-row col-md-12">
    <img style="position: absolute;float: right;width: 150px;" src="/img/auto.png"/>
    <h1 class="col-md-12">Tarification <span class="badge badge-success">Auto</span></h1>


    <div class="col-md-4 mb-3">
        <label for="titulairecartegrise">titulairecartegrise</label>
        <select class="custom-select" name="titulairecartegrise" id="titulairecartegrise" required>
            <option value="1" @if($voiture['titulairecartegrise']==1) selected @endif> Conducteur principale</option>
            <option value="2" @if($voiture['titulairecartegrise']==2) selected @endif> Conjoint ou concubin</option>
            <option value="3" @if($voiture['titulairecartegrise']==3) selected @endif> Conducteur proncipale ET
                conducteur et concubin
            </option>
            <option value="4" @if($voiture['titulairecartegrise']==4) selected @endif> Parents</option>
            <option value="5" @if($voiture['titulairecartegrise']==5) selected @endif> Parents du conjoint ou concubin
            </option>
            <option value="6" @if($voiture['titulairecartegrise']==6) selected @endif> Société</option>
            <option value="7" @if($voiture['titulairecartegrise']==7) selected @endif> Société de leaising</option>
            <option value="8" @if($voiture['titulairecartegrise']==8) selected @endif> Enfant</option>
        </select>
        <div class="invalid-tooltip">
            Merci de sélectionner un choix valide...
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="typepermis">Type du permis</label>
        <select class="custom-select" name="typepermis" id="typepermis" required>
            <option value="1" @if($voiture['typepermis']==1) selected @endif> Permis B</option>
            <option value="2" @if($voiture['typepermis']==2) selected @endif> Permis B avec accompagnement</option>
            <option value="3" @if($voiture['typepermis']==3) selected @endif> Permis Etrange UE</option>
            <option value="4" @if($voiture['typepermis']==4) selected @endif> Permis Etranger hors UE</option>
        </select>
        <div class="invalid-tooltip">
            Merci de sélectionner un choix valide...
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="dop">Date permis</label>
        <input required value="{{$voiture['dop']}}" type="date" class=" form-control form-control-sm" name="dop"
               id="dop" placeholder="Date d'obtention du permis">
    </div>
    <div class="form-group col-md-6">
        <label for="date_acqui">Date D'acquisition de la voiture</label>
        <input required value="{{$voiture['date_acqui']}}" type="date" class=" form-control form-control-sm"
               name="date_acqui" id="date_acqui" placeholder="Date D'acquisition de la voiture">
    </div>
    <div class="form-group col-md-6">
        <label for="date_contrat">Date debut du contrat souhaité</label>
        <input required value="{{$voiture['date_contrat']}}" type="date" class=" form-control form-control-sm"
               name="date_contrat" id="date_contrat" placeholder="Date début du contrat souhaité">
    </div>


    {{--                <label for="matricule">Matricule</label>--}}
    <div class="center input-group">
        <div class=" matricule col-md-2 left" style="text-align: right"></div>
        <div class="col-md-8 " style="">
            <input required value="{{$voiture['matricule']}}" style="text-align: center; height: 48px;" name="matricule"
                   id="matricule" type="text" class=" form-control form-control-sm  form-control form-control-sm-lg "
                   placeholder="AB-123-CD">
        </div>
        <div class="row justify-content-end matricule col-md-2"></div>

    </div>


    <div class="col-md-6 mb-3">
        <label for="usage_id">Usage du véhicule</label>
        <select class="custom-select" name="usage_id" id="usage_id" required>
            <option value="1" @if($voiture['usage_id']==1) selected @endif> Privé et trajet travail</option>
            <option value="2" @if($voiture['usage_id']==2) selected @endif> Privé</option>
            <option value="3" @if($voiture['usage_id']==3) selected @endif> Privé et professionnel</option>
            <option value="4" @if($voiture['usage_id']==4) selected @endif> Tous déplacements</option>
        </select>
        <div class="invalid-tooltip">
            Merci de sélectionner un choix valide...
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="financement_id">Financement du véhicule</label>
        <select class="custom-select" name="financement_id" id="financement_id" required>
            <option value="1" @if($voiture['financement_id']==1) selected @endif> Comptant</option>
            <option value="2" @if($voiture['financement_id']==2) selected @endif> Crédit</option>
            <option value="3" @if($voiture['financement_id']==3) selected @endif> Leasing</option>
            <option value="4" @if($voiture['financement_id']==4) selected @endif> Donation</option>
        </select>
        <div class="invalid-tooltip">
            Merci de sélectionner un choix valide...
        </div>
    </div>

    <div class="col-md-12 mb-3 row  form-row border-top border-bottom">

        <div class="   col-md-12">
            <label for="station_cp_n">Stationnement & Km </label>

        </div>
        <input value="{{$voiture['station_cp_n']}}" type="text" class=" form-control form-control-sm col-md-3"
               name="station_cp_n" id="station_cp_n" placeholder="code postal nuit">
        <input value="{{$voiture['station_ville_n']}}" type="text" class=" form-control form-control-sm col-md-3"
               name="station_ville_n" id="station_ville_n" placeholder="ville nuit">
        <input value="{{$voiture['station_cp_j']}}" type="text" class=" form-control form-control-sm col-md-3"
               name="station_cp_j" id="station_cp_j" placeholder="code postal travail">
        <input value="{{$voiture['station_ville_j']}}" type="text" class=" form-control form-control-sm col-md-3"
               name="station_ville_j" id="station_ville_j" placeholder="ville travail">

        <div class="invalid-tooltip">
            Merci de sélectionner un choix valide...
        </div>
        <div class="col-md-6 mb-3">

            <label for="station_id">Stationnement du véhicule Le jour</label>
            <select class="custom-select" name="station_id" id="station_id" required>
                <option value="1" @if($voiture['station_id']==1) selected @endif> Garage fermé</option>
                <option value="2" @if($voiture['station_id']==2) selected @endif> Parking Collectif plein air</option>
                <option value="3" @if($voiture['station_id']==3) selected @endif> Voie public</option>
                <option value="4" @if($voiture['station_id']==4) selected @endif> Jardin clos privé</option>
                <option value="5" @if($voiture['station_id']==5) selected @endif> Parking fermé collectif</option>
                <option value="6" @if($voiture['station_id']==6) selected @endif> Garage public surveillé</option>
            </select>
            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>
        <div class="col-md-6 mb-3">

            <label for="station_id">Stationnement du véhicule La nuit</label>
            <select class="custom-select" name="station_id" id="station_id" required>
                <option value="1" @if($voiture['station_id']==1) selected @endif> Garage fermé</option>
                <option value="2" @if($voiture['station_id']==2) selected @endif> Parking Collectif plein air</option>
                <option value="3" @if($voiture['station_id']==3) selected @endif> Voie public</option>
                <option value="4" @if($voiture['station_id']==4) selected @endif> Jardin clos privé</option>
                <option value="5" @if($voiture['station_id']==5) selected @endif> Parking fermé collectif</option>
                <option value="6" @if($voiture['station_id']==6) selected @endif> Garage public surveillé</option>
            </select>
            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        {{--        <div class="form-group col-md-6">--}}
        {{--            <label for="km_range">Km Range</label>--}}
        {{--            <input value="{{$voiture['km_range']}}"  type="number" class=" form-control form-control-sm" name="km_range"  id="km_range" placeholder="Km Range start">--}}
        {{--        </div>--}}

        <div class="col-md-6 mb-3">
            <label for="etat_assurance">Assuré actuellment ?</label>
            <select onchange="resiliation_date_()" class=" form-control form-control-sm" name="etat_assurance"
                    id="etat_assurance">
                <option VALUE="0" @if($voiture['etat_assurance']==0) selected @endif >NON</option>
                <option VALUE="1" @if($voiture['etat_assurance']==1) selected @endif>Oui</option>
                tarifi
                <option VALUE="-1" @if($voiture['etat_assurance']== -1) selected @endif>Jamais assuré</option>
            </select>
            {{--                        <input value="{{$voiture['etat_assurance']==null ? 0 : $voiture['etat_assurance']}}"  type="number" class=" form-control form-control-sm" name="etat_assurance"  id="etat_assurance" placeholder="Km Range start"> Km--}}

            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        <div class="col-md-6 mb-3" id="resiliation_date_div">
            <label for="resiliation_date">Date de résiliation</label>
            <input value="{{$voiture['resiliation_date']}}" type="date" class=" form-control form-control-sm"
                   name="resiliation_date" id="resiliation_date" placeholder="resiliation date">

            {{--                        <input value="{{$voiture['etat_assurance']==null ? 0 : $voiture['etat_assurance']}}"  type="number" class=" form-control form-control-sm" name="etat_assurance"  id="etat_assurance" placeholder="Km Range start"> Km--}}

            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        <div class="col-md-6 mb-3" id="resiliation_date_div">
            <label for="assureur">Assureur Actuel</label>
            <input value="{{$voiture['assureur']}}" type="text" class=" form-control form-control-sm"
                   name="assureur" id="assureur" placeholder="Assureur précedent">

            {{--                        <input value="{{$voiture['etat_assurance']==null ? 0 : $voiture['etat_assurance']}}"  type="number" class=" form-control form-control-sm" name="etat_assurance"  id="etat_assurance" placeholder="Km Range start"> Km--}}

            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>


        <div class="col-md-6 mb-3">
            <label for="last3y_assure">Mois d'assurance 3 dernieres années </label>
            <input min="0" value="{{$voiture['last3y_assure']==null ? 0 : $voiture['last3y_assure']}}" type="number"
                   class=" form-control form-control-sm" name="last3y_assure" id="last3y_assure"
                   placeholder="Km Range start">

            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        {{--        <div class="col-md-6 mb-3">--}}
        {{--            <label for="last3y_interruption">Nb mois d'interruption 3derniere anneés </label>--}}
        {{--            <input max="0" value="{{$voiture['last3y_interruption']==null ? -1 : $voiture['last3y_interruption']}}"  type="number" class=" form-control form-control-sm" name="last3y_interruption"  id="last3y_interruption" placeholder="Interruption 3 derniere années ">--}}

        {{--            <div class="invalid-tooltip">--}}
        {{--                Merci de sélectionner un choix valide...--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <script>
            const handleChange = (event) => {
                console.log(event.target.value);
            };
        </script>

        <div class="col-md-6 mb-3">
            <label for="assureur_resiliation">Résilié par un assurreur precedent !</label>
            <select
                onchange="if(this.value==1) document.getElementById('assureur_resiliation_date_div').style.display ='none'; else document.getElementById('assureur_resiliation_date_div').style.display ='block' "
                class="custom-select" name="assureur_resiliation" id="assureur_resiliation" required>
                <option value="1" @if($voiture['assureur_resiliation']==1) selected @endif> Jamais</option>
                <option value="2" @if($voiture['assureur_resiliation']==2) selected @endif> Non paiment de prime depuis
                    moins de 3mois
                </option>
                <option value="3" @if($voiture['assureur_resiliation']==3) selected @endif> Non paiement de prime entre
                    3 à 6 mois
                </option>
                <option value="4" @if($voiture['assureur_resiliation']==4) selected @endif> Non paiement de prime depuis
                    plus de 6 mois
                </option>
                <option value="5" @if($voiture['assureur_resiliation']==5) selected @endif> Sinistre</option>
                <option value="6" @if($voiture['assureur_resiliation']==6) selected @endif> Sinistre et non paiement de
                    prime depuis moins de 3 mois
                </option>
                <option value="7" @if($voiture['assureur_resiliation']==7) selected @endif> Sinistre et non paiement de
                    prime entre 3 à 6 mois
                </option>
                <option value="8" @if($voiture['assureur_resiliation']==8) selected @endif> Sinistre et non paiement de
                    prime depuis plus de 6 mois
                </option>
                <option value="9" @if($voiture['assureur_resiliation']==9) selected @endif> Fausses déclarations
                </option>
                <option value="10" @if($voiture['assureur_resiliation']==10) selected @endif> Nullité de contrat
                </option>
                <option value="11" @if($voiture['assureur_resiliation']==11) selected @endif> Autres</option>
                <option value="12" @if($voiture['assureur_resiliation']==12) selected @endif> Sinistre et conduite sous
                    l'empire d'un état alcoolique
                </option>
                <option value="13" @if($voiture['assureur_resiliation']==13) selected @endif> Sinistre et conduite sous
                    l’emprise de stupéfiant
                </option>
            </select>
            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        <div id="assureur_resiliation_date_div" style="display: none" class="col-md-12 mb-3">
            <label for="assureur_resiliation_date">Résiliation precedente Date</label>
            <input value="{{$voiture['assureur_resiliation_date']==null ? 0 : $voiture['assureur_resiliation_date']}}"
                   type="date" class=" form-control form-control-sm" name="assureur_resiliation_date"
                   id="assureur_resiliation_date" placeholder="Date derniere résiliations"> Km

            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="bonus_malus">Coefficient</label>
            <select class="custom-select" name="bonus_malus" id="bonus_malus" required>


                <option value="">--Sélectionnez--</option>
                <option value="0.5+7">0,5 soit 50 % de bonus, depuis plus de 6 ans</option>
                <option value="0.5+6">0,5 soit 50 % de bonus, depuis 5 à 6 ans</option>
                <option value="0.5+5">0,5 soit 50 % de bonus, depuis 4 à 5 ans</option>
                <option value="0.5+4">0,5 soit 50 % de bonus, depuis 3 à 4 ans</option>
                <option value="0.5+3">0,5 soit 50 % de bonus, depuis 2 à 3 ans</option>
                <option value="0.5+2">0,5 soit 50 % de bonus, depuis 1 à 2 ans</option>
                <option value="0.5+1">0,5 soit 50 % de bonus, depuis moins de 1 an</option>

                @for ($i = 51; $i <= 350; $i++)

                    @php
                        $bc=number_format($i/100, 2);
                        if(!empty($voiture)){$bc_db=$voiture['bonus_malus'];}
                    @endphp

                    <option {{$bc== $bc_db ? "selected" : ""}}   value="{{$bc}}">  {{$bc}} soit %% de bonus</option>
                    {{--                               {{$bc_db=$voiture['bonus_malus']}}--}}
                @endfor

            </select>
            <div class="invalid-tooltip">
                Merci de sélectionner un choix valide...
            </div>
        </div>


        <div class="row  form-row col-md-12">
            <div class="col-md-6  border-top   border-bottom">
                <label for="last3y_interruption">Sinistres</label>
                @php $id=0 @endphp
                <div class="bg-gradient-warning form-row  col-md-12">
                    <div class="form-group col-md-3">
                        <label for="">Date Sinistre</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Type Sinistre</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Résponsablité</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label for=""> Actions</label>
                    </div>
                    @foreach($sinistres as $sinistre)
                        @php $id++ @endphp






                        <div class="form-group col-md-3">
                            <input type="hidden" value="{{count($sinistres)}}" name="nb_sinistres" id="nb_sinistres"/>
                            <input type="date" class=" form-control form-control-sm" name="sinistre_date_{{$id}}"
                                   id="sinistre_date_{{$id}}" value="{{$sinistre['sinistre_date']}}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <select class="custom-select" name="sinistre_id_{{$id}}" id="sinistre_id_{{$id}}" required>
                                {{--                                        <option value="1"  @if($sinistre['sinistre_id']==1) selected @endif>  Bris de glace  </option>--}}
                                {{--                                        <option value="10"  @if($sinistre['sinistre_id']==10) selected @endif>Corporel Non Responsable</option>--}}
                                {{--                                        <option value="11"  @if($sinistre['sinistre_id']==11) selected @endif>Corporel Responsable</option>--}}
                                {{--                                        <option value="5"  @if($sinistre['sinistre_id']==5) selected @endif>  Incendie</option>--}}
                                {{--                                        <option value="8"  @if($sinistre['sinistre_id']==8) selected @endif >Matériel Non Responsable</option>--}}
                                {{--                                        <option value="9"  @if($sinistre['sinistre_id']==9) selected @endif>Matériel Responsable</option>--}}
                                {{--                                        <option value="2"  @if($sinistre['sinistre_id']==2) selected @endif>Collision</option>--}}
                                {{--                                        <option value="3"  @if($sinistre['sinistre_id']==3) selected @endif>  Vol</option>--}}
                                {{--                                        <option value="4"  @if($sinistre['sinistre_id']==4) selected @endif>  Stationnement</option>--}}

                                {{--                                        <option value="6"  @if($sinistre['sinistre_id']==6) selected @endif>  Vandalisme</option>--}}
                                {{--                                        <option value="7"  @if($sinistre['sinistre_id']==7) selected @endif>  Evenements natuels</option>--}}

                                <option value="1" @if($sinistre['sinistre_id']==1) selected @endif> Collision</option>
                                <option value="2" @if($sinistre['sinistre_id']==2) selected @endif> Bris de glace
                                </option>
                                <option value="3" @if($sinistre['sinistre_id']==3) selected @endif> Vol</option>
                                <option value="4" @if($sinistre['sinistre_id']==4) selected @endif> Stationnement
                                </option>
                                <option value="5" @if($sinistre['sinistre_id']==5) selected @endif> Incendie</option>
                                <option value="6" @if($sinistre['sinistre_id']==6) selected @endif> Vandalisme</option>
                                <option value="7" @if($sinistre['sinistre_id']==7) selected @endif> Evenements natuels
                                </option>
                                <option value="8" @if($sinistre['sinistre_id']==8) selected @endif> Matériel</option>
                                <option value="9" @if($sinistre['sinistre_id']==9) selected @endif> Corporel</option>


                            </select>
                            <div class="invalid-tooltip">
                                Merci de sélectionner un choix valide.....
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <select class="custom-select" name="responsable_{{$id}}" id="responsable_{{$id}}" required>
                                <option value="0" @if($sinistre['responsable']==0) selected @endif> 0 %</option>
                                <option value="50" @if($sinistre['responsable']==50) selected @endif> 50 %</option>
                                <option value="100" @if($sinistre['responsable']==100) selected @endif> 100 %</option>
                            </select>
                            <div class="invalid-tooltip">
                                Merci de sélectionner un choix valide...
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <a href="sinistre/delete/{{$sinistre['id']}}">
                                <i class="material-icons" style="color:red">delete_forever</i>
                            </a>
                        </div>

                    @endforeach

                </div>
                @include('clients.voitures.sisadd')

            </div>

            <div class="col-md-12  border-top   border-bottom">
                @include('clients.voitures.sanctions.sanctions')
            </div>

            @if($voiture['id']>0)
                <div class="col-3 mt-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        + sinistre / Sanctions / infractions
                    </button>
                </div>
            @endif

        </div>


    </div>



</div>


<script>
    function resiliation_date_() {

        if (document.getElementById('etat_assurance').value == 0) {
            document.getElementById('resiliation_date').classList.remove('d-none');
            document.getElementById('last3y_assure').classList.remove('d-none');
            document.getElementById('assureur_resiliation').classList.remove('d-none');
            document.getElementById('assureur').classList.remove('d-none');
        }
        else {
            document.getElementById('resiliation_date').classList.add('d-none');
            document.getElementById('last3y_assure').classList.add('d-none');
            document.getElementById('assureur_resiliation').classList.add('d-none');
            document.getElementById('assureur').classList.add('d-none');
        }
    }

    setTimeout(function () {

        resiliation_date_();
    }, 50)


    //
</script>
