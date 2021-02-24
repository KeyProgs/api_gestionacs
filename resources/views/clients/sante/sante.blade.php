<div class="p-3 mb-2 bg-gradient  row  form-row col-md-12">

    <div class="form-group col-md-6">
        <label for="date_contrat"> S’agit-il d’une vente à distance (VAD) ? </label>
        <input value="" @if($client['sante_distance']==1) checked @endif
               style="" name="adistance_oui"
               id="adistance" type="radio"
               class=" form-control form-control-sm  form-control form-control-sm-lg "
               placeholder="date d'Echeance">Oui
        <input value="" @if($client['sante_distance']==0) checked @endif
               style="" name="adistance_non"
               id="adistance" type="radio"
               class=" form-control form-control-sm  form-control form-control-sm-lg "
               placeholder="date d'Echeance">Non
    </div>
    <div class="form-group col-md-6">
        <label for="date_contrat_sante">Date debut du contrat souhaité</label>
        <input value="{{$client['sante_date_contrat']}}"
               style="text-align: center; height: 48px;" name="sante_date_contrat"
               id="sante_date_contrat" type="date"
               class=" form-control form-control-sm  form-control form-control-sm-lg "
               placeholder="date d'Echeance">
    </div>
    <div class="form-group col-md-6">
        <label for="date_contrat">Régime</label>




        <select class=" form-control form-control-sm  form-control form-control-sm-lg " name="regime_id" id="regime_id">
            <option value="" selected="selected"></option>
            <option @if($client['regime_id']==1) selected @endif value="1">Etudiant</option>
            <option @if($client['regime_id']==2) selected @endif value="2">Salarié agricole</option>
            <option @if($client['regime_id']==3) selected @endif value="3">Régime Alsace Moselle</option>
            <option @if($client['regime_id']==4) selected @endif value="4">Travailleur non salarié</option>
            <option @if($client['regime_id']==5) selected @endif value="5">Salarié</option>
            <option @if($client['regime_id']==6) selected @endif value="6">Exploitant agricole</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="date_contrat">Assureur Précédent</label>
        <input value="{{$client['sante_assureur']}}"
               style="text-align: center; height: 48px;" name="sante_assureur"
               id="sante_assureur" type="text"
               class=" form-control form-control-sm  form-control form-control-sm-lg "
               placeholder="Assureur Précédent">
    </div>
    <div class=" row  form-row form-group col-md-12">
        <label for="date_contrat">N° sécurité sociale</label>
        <input class="form-group col-md-10" value="{{$client['sante_sc']}}"
               style="text-align: center; height: 48px;" name="sante_sc"
               id="sante_sc" type="text"
               class=" form-control form-control-sm  form-control form-control-sm-lg form-group col-md-8"
               placeholder="N° sécurité sociale">
        <input value="{{$client['sante_sc_clef']}}"
               style="text-align: center; height: 48px;" name="sante_sc_clef"
               id="sante_sc_clef" type="text"
               class=" form-control form-control-sm  form-control form-control-sm-lg form-group col-md-2"
               placeholder="Clé">
    </div>


</div>
