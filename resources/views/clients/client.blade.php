@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Client :</h1>
@stop

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>

    @endif


    <div>

        {{--        <button class="btn btn-app"><a  href="">Ajouter Client</a></button>--}}
        <form id="client_form" class="row  form-row col-md-12 row justify-content-between"
              action="/client/{{isset($client['id']) ? "edit/$client[id]" : "add"}}" method="POST">
            @csrf


            <div class="col-md-12">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" onclick="document.getElementById('client_form').submit();" href="#">Enregistrer </a>
                        <a class="dropdown-item" href="/client/delete/{{$client->id}}">Suprimer la fiche client</a>
                        <a class="dropdown-item" href="/client/add">Ajouter Un client</a>
                        <a class="dropdown-item" href="#">Historique Client</a>
                        <a class="dropdown-item" href="#">-----------------</a>
                        <a class="dropdown-item" href="/clientslist">liste Clients</a>
                    </div>
                </div>
            </div>


            <table class="col-md-12">
                <tr>
                    <td  style="vertical-align:top">
                        <div class="p-3 mb-2 bg-gradient-light  row   form-row col-md-12 rounded-lg">

                            <div id="headingClient" data-toggle="collapse" style="cursor: pointer;"
                                 class="bg-gradient-white rounded-lg col-md-12"
                                 data-target="#collapseClient" aria-expanded="true" aria-controls="collapseClient">
                                <button type='button' class="btn btn-link">
                                    @if(!empty($client['nom'])) @php $showNewClient="show" @endphp @else {{$showNewClient=""}} @endif
                                </button>


                                <img style="position: relative;float: right;width: 150px;" src="/img/profile.png"/>
                                <h1>
                                    <span class="badge badge-primary">
                                    @if(!empty($client['nom'])) {{$client['nom']}} {{$client['prenom']}} @else Nouveau
                                        client # @endif
                                    </span>
                                </h1>
                            </div>


                            <div id="collapseClient" class="  {{$showNewClient}}  p-3 mb-2 bg-gradient-light  row   form-row col-md-12 " aria-labelledby="headingClient"
                                 data-parent="#accordion">


                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Civilite</label>
                                    </div>
                                    <select className=" form-control form-control-sm" id="civilite" name="civilite">
                                        <option value="0"> Civilité</option>
                                        <option value="1" @if($client['civilite']==1) selected @endif> Mr</option>
                                        <option value="2" @if($client['civilite']==2) selected @endif> Mme</option>
                                        <option value="3" @if($client['civilite']==3) selected @endif> Moisel</option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label for="nom">Nom</label>
                                    <input required type="text" class=" form-control form-control-sm" name="nom"
                                           id="nom"
                                           value="{{$client['nom']}}">
                                </div>


                                <div class="col-md-6">
                                    <label for="prenom">Prénom</label>
                                    <input required type="text" class=" form-control form-control-sm" name="prenom"
                                           id="prenom"
                                           value="{{$client['prenom']}}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input required type="email" class=" form-control form-control-sm" name="email"
                                           id="email"
                                           value="{{$client['email']}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="indicatif">Indicatif</label>
                                    <input required type="text" class=" form-control form-control-sm" name="indicatif"
                                           id="indicatif" maxlength="4" max="4" value="{{$client['indicatif']}}"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="portable">Portable</label>
                                    <input required type="text" class=" form-control form-control-sm" name="portable"
                                           id="portable"
                                           value="{{$client['portable']}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fixe">Fixe</label>
                                    <input type="text" class=" form-control form-control-sm" name="fixe" id="fixe"
                                           value="{{$client['fixe']}}">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="activite_id">Activite {{$voiture['activite_id']}}  </label>
                                    <select class="custom-select" name="activite_id" id="activite_id" required>
                                        <option value="1" @if($client['activite_id']==1) selected @endif>Salarié non
                                            cadre
                                        </option>
                                        <option value="2" @if($client['activite_id']==2) selected @endif> Salarié
                                            cadre
                                        </option>
                                        <option value="3" @if($client['activite_id']==3) selected @endif> Etudiant
                                        </option>
                                        <option value="4" @if($client['activite_id']==4) selected @endif>
                                            Fonctionnaire
                                        </option>
                                        <option value="5" @if($client['activite_id']==5) selected @endif> Recherche
                                            d'emplois
                                        </option>
                                        <option value="6" @if($client['activite_id']==6) selected @endif> Retraité
                                        </option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Merci de sélectionner un choix valide...
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sitfam_id">Situation familliale</label>
                                    <select class="custom-select" name="sitfam_id" id="sitfam_id" required>
                                        <option value="1" @if($voiture['sitfam_id']==1) selected @endif>Célibataire
                                        </option>
                                        <option value="2" @if($voiture['sitfam_id']==2) selected @endif>Marié</option>
                                        <option value="3" @if($voiture['sitfam_id']==3) selected @endif>Concubinage
                                        </option>
                                        <option value="4" @if($voiture['sitfam_id']==4) selected @endif>Pascé</option>
                                        <option value="5" @if($voiture['sitfam_id']==5) selected @endif>Séparé</option>
                                        <option value="6" @if($voiture['sitfam_id']==6) selected @endif>Divorcé</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Merci de sélectionner un choix valide...
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="dn">Date Naissance</label>
                                    <input required type="date" class=" form-control form-control-sm" name="dn" id="dn"
                                           value="{{$client['dn']}}">
                                </div>


                                <div class="p-3 mb-2   form-row border-top border-bottom">
                                                        <div class="hidden form-group col-md-12">
                                                            <label for="adresse">Adresse</label>
{{--                                                            <textarea class=" form-control form-control-sm is-valid" name="adresse"  id="adresse" placeholder="Adresse" required>{{$client['adresse']}}</textarea>--}}
                                                        </div>
                                    <div class="form-group col-md-2">
                                        <label for="cp">Code Postale</label>
                                        <input required type="text" class=" form-control form-control-sm" name="cp"
                                               id="cp"
                                               value="{{$client['cp']}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="rue">N°Rue</label>
                                        <input required min="0" type="number" class=" form-control form-control-sm"
                                               name="rue"
                                               id="rue" value="{{$client['rue']}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="typevoie">Type voie</label>
                                        <input required type="text" class=" form-control form-control-sm"
                                               name="typevoie"
                                               id="typevoie" value="{{$client['typevoie']}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nomvoie">Nom voie</label>
                                        <input required type="text" class=" form-control form-control-sm" name="nomvoie"
                                               id="nomvoie" value="{{$client['nomvoie']}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="ville">Ville</label>
                                        <input required type="text" class=" form-control form-control-sm" name="ville"
                                               id="ville"
                                               value="{{$client['ville']}}">
                                    </div>
                                </div>


                            </div>


                        </div>
                    </td>
                    <td>

                        <div class="p-3 mb-2 bg-gradient-white  row  form-row col-md-12 rounded-lg">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button type='button' class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                <img width="50px" src="/img/car_logo.jpg"> Auto
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">

                                            @include("clients.voitures.voiture")

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button type='button' class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                <img width="50px" src="/img/sante.png"> Santé
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordion">
                                        <div class="card-body">

                                            @include("clients.sante.sante")

                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button type='button' class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                <img width="50px" src="/img/habitation.png"> Habitation
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            Habitation
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFor">
                                        <h5 class="mb-0">
                                            <button type='button' class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseFor" aria-expanded="false"
                                                    aria-controls="collapseFor">
                                                <img width="50px" src="/img/habitation.png"> CGM
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFor" class="collapse show" aria-labelledby="headingFor"
                                         data-parent="#accordion">
                                        <div class="card-body">

                                            <x-cgm :clientId="$client->id"  />

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFor">
                                        <h5 class="mb-0">
                                            <button type='button' class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseFor" aria-expanded="false"
                                                    aria-controls="collapseFor">
                                                <img width="50px" src="/img/habitation.png"> Affaires et Documents
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFor" class="collapse show" aria-labelledby="headingFor"
                                         data-parent="#accordion">
                                        <div class="card-body">

                                            <x-client-files  :clientId="$client->id" />

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </td>

                </tr>
            </table>


        </form>





    </div>


@stop



<style>

    .matricule {
        background-image: url('/img/matricule.png') !important;
        background-size: contain;

        background-repeat: no-repeat;
        width: 20px;
        height: 48px;
        /*height: calc(2.875rem + 2px);*/


    }

</style>



