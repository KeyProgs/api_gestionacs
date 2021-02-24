
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard : Ajouter Client</h1>
@stop

@section('content')

    <div >
        @if(session()->has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session()->get('success') }}</strong>
            </div>

        @endif
        <form class="row  form-row col-md-12 row justify-content-between" action="/client/edit/{{$client['id']}}" method="POST">
@csrf

            <div  class="p-3 mb-2 bg-gradient-info  row  form-row col-md-6">
{{--                <img style="position: absolute;float: right;width: 150px;" src="/img/profile.png" />--}}
                <h1>Tarification  <span class="badge badge-primary">Détails client.</span></h1>
                <div class="input-group col-md-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Civilite</label>
                    </div>
                     <select className="form-control" id="civilite"  name="civilite" >
                        <option value="0"  > Civilité</option>
                        <option value="1"  @if($client['civilite']==1) selected @endif>  Mr</option>
                        <option value="2"  @if($client['civilite']==2) selected @endif>  Mme</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom"  id="nom" value="{{$client['nom']}}">


                </div>
                <div class="col-md-7">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom"  id="prenom"  value="{{$client['prenom']}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"  id="email" value="{{$client['email']}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="indicatif">Indicatif</label>
                    <input type="text" class="form-control" name="indicatif"  id="indicatif"  maxlength="4" max="4"  value="{{$client['indicatif']}}" />
                </div>
                <div class="form-group col-md-5">
                    <label for="portable">Portable</label>
                    <input type="text" class="form-control" name="portable"  id="portable" value="{{$client['portable']}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="fixe">Fixe</label>
                    <input type="text" class="form-control" name="fixe"  id="fixe" value="{{$client['fixe']}}">
                </div>

                <div class="p-3 mb-2   form-row border-top border-bottom">
                    <div class="form-group col-md-12">
                        <label for="adresse">Adresse</label>
                        <textarea class="form-control is-valid" name="adresse"  id="adresse" placeholder="Adresse" required>{{$client['adresse']}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cp">Code Postale</label>
                        <input type="text" class="form-control" name="cp"  id="cp" value="{{$client['cp']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rue">Rue</label>
                        <input type="text" class="form-control" name="rue"  id="rue" value="{{$client['rue']}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="typevoie">Type voie</label>
                        <input type="text" class="form-control" name="typevoie"  id="typevoie" value="{{$client['typevoie']}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nomvoie">Nom voie</label>
                        <input type="text" class="form-control" name="nomvoie"  id="nomvoie" value="{{$client['nomvoie']}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dn">Ville</label>
                        <input type="text" class="form-control" name="ville"  id="ville" value="{{$client['ville']}}">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="dn">Date Naissance</label>
                    <input type="text" class="form-control" name="dn"  id="dn" value="{{$client['dn']}}">
                </div>



            </div>





            <div  class="p-3 mb-2 bg-gradient-gray  row  form-row col-md-6">
                <img style="position: absolute;float: right;width: 150px;" src="/img/auto.png" />
                <h1 class="col-md-12">Tarification  <span class="badge badge-success">Auto</span></h1>



                <div class="col-md-6 mb-3">
                    <label for="activite_id">Activite  {{$voiture['activite_id']}}  </label>
                    <select class="custom-select" name="activite_id" id="activite_id" required>
                        <option value="1"  @if($client['activite_id']==1) selected @endif>Salarié non cadre</option>
                        <option value="2"  @if($client['activite_id']==2) selected @endif>  Salarié cadre</option>
                        <option value="3"  @if($client['activite_id']==3) selected @endif>  Etudiant</option>
                        <option value="4"  @if($client['activite_id']==4) selected @endif>  Fonctionnaire</option>
                        <option value="5"  @if($client['activite_id']==5) selected @endif>  Recherche d'emplois</option>
                        <option value="6"  @if($client['activite_id']==6) selected @endif>  Retraité</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sitfam_id">Situation familliale</label>
                    <select class="custom-select" name="sitfam_id"  id="sitfam_id" required>
                        <option value="1"  @if($voiture['sitfam_id']==1) selected @endif>Célibataire</option>
                        <option value="2"  @if($voiture['sitfam_id']==2) selected @endif>Marié</option>
                        <option value="3"  @if($voiture['sitfam_id']==3) selected @endif>Concubinage</option>
                        <option value="4"  @if($voiture['sitfam_id']==4) selected @endif>Pascé</option>
                        <option value="5"  @if($voiture['sitfam_id']==5) selected @endif>Séparé</option>
                        <option value="6"  @if($voiture['sitfam_id']==6) selected @endif>Divorcé</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="titulairecartegrise">titulairecartegrise</label>
                    <select class="custom-select" name="titulairecartegrise"  id="titulairecartegrise" required>
                        <option value="1"  @if($voiture['titulairecartegrise']==1) selected @endif>  Conducteur principale</option>
                        <option value="2"  @if($voiture['titulairecartegrise']==2) selected @endif>  Conjoint ou concubin</option>
                        <option value="3"  @if($voiture['titulairecartegrise']==3) selected @endif>  Conducteur proncipale ET conducteur et concubin</option>
                        <option value="4"  @if($voiture['titulairecartegrise']==4) selected @endif>  Parents</option>
                        <option value="5"  @if($voiture['titulairecartegrise']==5) selected @endif>  Parents du conjoint ou concubin</option>
                        <option value="6"  @if($voiture['titulairecartegrise']==6) selected @endif>  Société</option>
                        <option value="7"  @if($voiture['titulairecartegrise']==7) selected @endif>  Société de leaising</option>
                        <option value="8"  @if($voiture['titulairecartegrise']==8) selected @endif>  Enfant</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="typepermis">Type du permis</label>
                    <select class="custom-select" name="typepermis"  id="typepermis" required>
                        <option value="1"  @if($voiture['typepermis']==1) selected @endif>  Permis B</option>
                        <option value="2"  @if($voiture['typepermis']==2) selected @endif>  Permis B avec accompagnement</option>
                        <option value="3"  @if($voiture['typepermis']==3) selected @endif>  Permis Etrange UE</option>
                        <option value="4"  @if($voiture['typepermis']==4) selected @endif>  Permis Etranger hors UE</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="dop">Date d'obtention du permis</label>
                    <input value="{{$voiture['dop']}}" type="date" class="form-control" name="dop"  id="dop" placeholder="Date d'obtention du permis">
                </div>
                <div class="form-group col-md-6">
                    <label for="date_acqui">Date D'acquisition de la voiture</label>
                    <input value="{{$voiture['date_acqui']}}" type="date" class="form-control" name="date_acqui"  id="date_acqui" placeholder="Date D'acquisition de la voiture">
                </div>
                <div class="form-group col-md-6">
                    <label for="date_contrat">Date debut du contrat souhaité</label>
                    <input value="{{$voiture['date_contrat']}}" type="date" class="form-control" name="date_contrat"  id="date_contrat" placeholder="Date début du contrat souhaité">
                </div>


{{--                <label for="matricule">Matricule</label>--}}
                <div class="center input-group">
                    <div  class="row justify-content-start matricule col-md-2"> </div>
                    <div class="col-md-8 ">
                        <input value="{{$voiture['matricule']}}" style="text-align: center; " name="matricule"  id="matricule" type="text" class="form-control form-control-lg " placeholder="AB-123-CD" >
                    </div>
                    <div  class="row justify-content-end matricule col-md-2"> </div>

                </div>



                <div class="col-md-6 mb-3">
                    <label for="usage_id">Usage du véhicule</label>
                    <select class="custom-select" name="usage_id"  id="usage_id" required>
                        <option value="1"  @if($voiture['usage_id']==1) selected @endif>  Privé et trajet travail</option>
                        <option value="2"  @if($voiture['usage_id']==2) selected @endif>  Privé</option>
                        <option value="3"  @if($voiture['usage_id']==3) selected @endif>  Privé et professionnel</option>
                        <option value="4"  @if($voiture['usage_id']==4) selected @endif>  Tous déplacements</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="financement_id">Financement du véhicule</label>
                    <select class="custom-select" name="financement_id"  id="financement_id" required>
                        <option value="1"  @if($voiture['financement_id']==1) selected @endif>  Comptant</option>
                        <option value="2"  @if($voiture['financement_id']==2) selected @endif>  Crédit</option>
                        <option value="3"  @if($voiture['financement_id']==3) selected @endif>  Leasing</option>
                        <option value="4"  @if($voiture['financement_id']==4) selected @endif>  Donation</option>
                    </select>
                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                </div>

                <div class="col-md-12 mb-3 row  form-row border-top border-bottom">

                    <div class="   col-md-12">
                        <label for="station_cp_n">Stationnement & Km </label>
                    </div>
                    <input value="{{$voiture['station_cp_n']}}" type="text" class="form-control col-md-3" name="station_cp_n"  id="station_cp_n" placeholder="code postal nuit">
                    <input value="{{$voiture['station_ville_n']}}" type="text" class="form-control col-md-3" name="station_ville_n"  id="station_ville_n" placeholder="ville nuit">
                    <input value="{{$voiture['station_cp_j']}}" type="text" class="form-control col-md-3" name="station_cp_j" id="station_cp_j" placeholder="code postal travail">
                    <input value="{{$voiture['station_ville_j']}}" type="text" class="form-control col-md-3" name="station_ville_j" id="station_ville_j" placeholder="ville travail">

                    <div class="invalid-tooltip">
                        Merci de sélectionner un choix valide...
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="station_id">Stationnement du véhicule</label>
                        <select class="custom-select" name="station_id"  id="station_id" required>
                            <option value="1"  @if($voiture['station_id']==1) selected @endif>  Garage fermé</option>
                            <option value="2"  @if($voiture['station_id']==2) selected @endif>  Parking Collectif plein air</option>
                            <option value="3"  @if($voiture['station_id']==3) selected @endif>  Voie public</option>
                            <option value="4"  @if($voiture['station_id']==4) selected @endif>  Jardin clos privé</option>
                            <option value="5"  @if($voiture['station_id']==5) selected @endif>  Parking fermé collectif</option>
                            <option value="6"  @if($voiture['station_id']==6) selected @endif>  Garage public surveillé</option>
                        </select>
                        <div class="invalid-tooltip">
                            Merci de sélectionner un choix valide...
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="km_range">Km Range</label>
                        <input value="{{$voiture['km_range']}}"  type="number" class="form-control" name="km_range"  id="km_range" placeholder="Km Range start">
                    </div>

                    <div class="border-top  col-md-6 mb-3">
                        <label for="etat_assurance">Assurance actuelle  Etat -/+ mois </label>
                        <input value="{{$voiture['etat_assurance']==null ? -1 : $voiture['etat_assurance']}}"  type="number" class="form-control" name="etat_assurance"  id="etat_assurance" placeholder="Km Range start"> Km

                        <div class="invalid-tooltip">
                            Merci de sélectionner un choix valide...
                        </div>
                    </div>



                    <div class="border-top  col-md-6 mb-3">
                        <label for="last3y_assure">Nombre de mois d'assurance 3 dernieres années </label>
                        <input min="0" value="{{$voiture['last3y_assure']==null ? -1 : $voiture['last3y_assure']}}"  type="number" class="form-control" name="last3y_assure"  id="last3y_assure" placeholder="Km Range start">

                        <div class="invalid-tooltip">
                            Merci de sélectionner un choix valide...
                        </div>
                    </div>

                    <div class="border-top  col-md-6 mb-3">
                        <label for="last3y_interruption">Nb mois d'interruption 3derniere anneés </label>
                        <input max="0" value="{{$voiture['last3y_interruption']==null ? -1 : $voiture['last3y_interruption']}}"  type="number" class="form-control" name="last3y_interruption"  id="last3y_interruption" placeholder="Interruption 3 derniere années ">

                        <div class="invalid-tooltip">
                            Merci de sélectionner un choix valide...
                        </div>
                    </div>

                    <div class="border-top  col-md-6 mb-3">
                        <label for="assureur_resiliation">Résiliation precedente assurreur</label>
                        <select class="custom-select" name="assureur_resiliation"  id="assureur_resiliation" required>
                            <option value="1"  @if($voiture['assureur_resiliation']==1) selected @endif> Nom </option>
                            <option value="2"  @if($voiture['assureur_resiliation']==2) selected @endif> Non paiment de prime depuis moins de 3mois </option>
                            <option value="3"  @if($voiture['assureur_resiliation']==3) selected @endif>  Non paiement de prime entre 3 à 6 mois </option>
                            <option value="4"  @if($voiture['assureur_resiliation']==4) selected @endif> Non paiement de prime depuis plus de 6 mois </option>
                            <option value="5"  @if($voiture['assureur_resiliation']==5) selected @endif>  Sinistre </option>
                            <option value="6"  @if($voiture['assureur_resiliation']==6) selected @endif> Sinistre et non paiement de prime depuis moins de 3 mois </option>
                            <option value="7"  @if($voiture['assureur_resiliation']==7) selected @endif> Sinistre et non paiement de prime entre 3 à 6 mois </option>
                            <option value="8"  @if($voiture['assureur_resiliation']==8) selected @endif> Sinistre et non paiement de prime depuis plus de 6 mois </option>
                            <option value="9"  @if($voiture['assureur_resiliation']==9) selected @endif>  Fausses déclarations </option>
                            <option value="10"  @if($voiture['assureur_resiliation']==10) selected @endif> Nullité de contrat </option>
                            <option value="11"  @if($voiture['assureur_resiliation']==11) selected @endif> Autres </option>
                            <option value="12"  @if($voiture['assureur_resiliation']==12) selected @endif> Sinistre et conduite sous l'empire d'un état alcoolique </option>
                            <option value="13"  @if($voiture['assureur_resiliation']==13) selected @endif> Sinistre et conduite sous l’emprise de stupéfiant </option>
                        </select>
                        <div class="invalid-tooltip">
                            Merci de sélectionner un choix valide...
                        </div>
                    </div>


                </div>



            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>

















    </div>


@stop


<style >

    .matricule {
        background-image: url('/img/matricule.png') !important;
        background-size: cover; //or cover
        background-repeat: no-repeat;
        width: 20px;
        height: calc(2.875rem + 2px);



    }

</style>
