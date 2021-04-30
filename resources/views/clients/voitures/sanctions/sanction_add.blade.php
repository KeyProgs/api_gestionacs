<form id="sanction_form" class="col-md-12 bg-gradient-warning form-row border-top border-bottom"
      action="{{URL::to('clients/voitures/sanctions/add')}}" method="POST">
    @csrf

    <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">


    <!-- Modal -->
    <table>
        <tr>
            <td>
                <label for="">Date</label>
            </td>

            <td>
                <label for=""> Infractions</label>
            </td>
            <td>
                <label for=""> Date début</label>
            </td>
            <td>
                <label for=""> Fin </label>
            </td>
            <td>
                <label for=""> Pro </label>
            </td>
            <td>
                <label for=""> ethylotest </label>
            </td>
            <td>
                <label for=""> Sang test </label>
            </td>
            <td>
                <label for=""> Actions </label>
            </td>
        </tr>


        <tr>

            <td>
                <input type="date" class=" form-control form-control-sm"
                       name="sanctionDate"
                       id="sanctionDate" value="">
            </td>
            <td>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary"><i class="fa fa-cogs"></i></a>
                    <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style="padding: 10px" id="myDiv">


                        @if($infractions !=null)
                            @foreach( $infractions as $key =>  $infractionIthem )

                                <li>
                                    <p>
                                        <input type="checkbox" value="{{$infractionIthem->id}}"
                                               name="infractionIthem_{{$infractionIthem->id}}"
                                               id="infractionIthem_{{$infractionIthem->id}}"/>
                                        {{$infractionIthem->id}} {{$infractionIthem->id}}{{$infractionIthem->infraction}}
                                    </p>
                                </li>
                            @endforeach
                        @endif


                    </ul>


                </div>

                <input type="checkbox"
                       name="infractionIthem____" id="infractionIthem_{{@$key}}"/>
            </td>
            <td>
                <input type="date" class=" form-control form-control-sm"
                       name="sanctionDateD"
                       id="sanctionDateD" value="">
            </td>
            <td>
                <input type="date" class=" form-control form-control-sm"
                       name="sanctionDateF"
                       id="sanctionDateF" value="">
            </td>
            <td>
                <input type="checkbox" class=" form-control form-control-sm"
                       name="circonstance_pro"
                       id="circonstance_pro" value="">

            </td>
            <td>
                <input type="text" class=" form-control form-control-sm" size="5" step="0.1"
                       name="sanctionEthylotest"
                       id="sanctionEthylotest" value="">


            </td>
            <td>
                <input type="number" class=" form-control form-control-sm" size="5" step="0.1"
                       name="sanctionSangtest"
                       id="sanctionSangtest" value="">

            </td>
            <td>


            </td>
        </tr>


    </table>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter Sanction</button>
    </div>
</form>
