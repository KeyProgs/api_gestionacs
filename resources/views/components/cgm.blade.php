<table class="table table-striped">
    @foreach($contrats as $contrat)
        <tr>
            <td><a href="{{url('contrats/get/')}}{{$contrat->id}}">{{$contrat->nomcontrat}}</a></td>
            <td>{{$contrat->montant}} euro</td>
            <td>{{$contrat->status}}</td>

        </tr>
    @endforeach
</table>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Ajouter CGM
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('contrats/create')}}">
                    @csrf
                    <input required type="hidden" class=" form-control form-control-sm" name="client_id" id="compagnie"
                           placeholder="Compagnie">

                    <div class="col-md-6">
                        <label for="nom">Type Contrat</label>
                        <select id="templatecontrat_id" name="templatecontrat_id" class=" form-control form-control-sm">
                            <option value="1">Mensuel</option>
                            <option value="2">Trimestriel</option>
                            <option value="3">Semestriel</option>
                            <option value="4">Annuelle</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nom">compagnie</label>
                        <input required type="text" class=" form-control form-control-sm" name="compagnie" id="compagnie"
                               placeholder="compagnie">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">nomcontrat</label>
                        <input required type="text" class=" form-control form-control-sm" name="nomcontrat" id="nomcontrat"
                               placeholder="Nom Contrat">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">numerocontrat</label>
                        <input required type="text" class=" form-control form-control-sm" name="numerocontrat" id="numerocontrat"
                               placeholder="numerocontrat">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">jour prelevement</label>
                        <select required class=" form-control form-control-sm" name="jourprelevement" id="jourprelevement"
                                placeholder="Compagnie" size="">
                            @for($i=1; $i<31;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nom">montant</label>
                        <input required type="number" class=" form-control form-control-sm" name="montant" id="montant"
                               placeholder="montant">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">status</label>
                        <input required type="text" class=" form-control form-control-sm" name="status" id="status"
                               placeholder="status">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">dateeffet</label>
                        <input required type="date" class=" form-control form-control-sm" name="dateeffet" id="dateeffet"
                               placeholder="dateeffet">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">BIC</label>
                        <input required type="text" class=" form-control form-control-sm" name="BIC" id="BIC" placeholder="BIC">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">IBAN</label>
                        <input required type="number" class=" form-control form-control-sm" name="IBAN" id="IBAN" placeholder="IBAN">
                    </div>
                    <div class="col-md-6">
                        <label for="nom">note</label>
                        <input required type="text" class=" form-control form-control-sm" name="note" id="note" placeholder="note">
                    </div>

                    <br>
                    <input class="btn-primary" type="submit" name="save" value="Enregistrer">

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

