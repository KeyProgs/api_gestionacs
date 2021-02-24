<form id="sinistre_form" class="col-md-12" action="{{URL::to('clients/voitures/sinistres/add')}}" method="POST" novalidate>
    @csrf

        <input type="hidden" name="voiture_id" id="voiture_id" value="{{$voiture->id}}">


    <!-- Modal -->
    <div  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sinistreAddModalLabel">Ajouter Sinistre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="bg-gradient-warning form-row border-top border-bottom">
                        <div class="form-group col-md-4">
                            <label for="dn">Date Sinistres</label>
                            <input type="date" class="form-control" name="sinistre_date"  id="sinistre_date" value="{{date("Y-m-d")}}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="station_id">Type Sinistre</label>
                            <select class="custom-select" name="sinistre_id"  id="sinistre_id" required>
                                <option value="1" >  Collision</option>
                                <option value="2" >  Bris de glace</option>
                                <option value="3" >  Vol</option>
                                <option value="4" >  Stationnement</option>
                                <option value="5" >  Incendie</option>
                                <option value="6" >  Vandalisme</option>
                                <option value="7" >  Evenements natuels</option>
                                <option value="8" >  Matériel</option>
                                <option value="9" >  Corporel</option>

                            </select>
                            <div class="invalid-tooltip">
                                Merci de sélectionner un choix valide...
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="station_id">Résponsabilité</label>
                            <select class="custom-select" name="responsable"  id="responsable" required>
                                <option value="0" >  0 %</option>
                                <option value="50" >  50 %</option>
                                <option value="100" >  100 %</option>
                            </select>
                            <div class="invalid-tooltip">
                                Merci de sélectionner un choix valide...
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter Sinistre </button>
                </div>
            </div>
        </div>
    </div>
</form>
