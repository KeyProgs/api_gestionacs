<label for="last3y_interruption">Sanctions</label>
@php $id=0 @endphp
<div class="bg-gradient-info form-row border-top border-bottom col-md-12">

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


        @if(!empty($sanctions))
            <input type="hidden" name="nb_sanctions" id="nb_sanctions" value="{{@$sanctions->count()}}" />

        @foreach($sanctions as $sanction)
            @php  $id++;  @endphp
            <input type="hidden" name="sanction{{$id}}_nb_infractions" id="sanction{{$id}}_nb_infractions" value="{{$sanction->infractions->count()}}" />
            <tr>

                <td>
                    <input type="date" class=" form-control form-control-sm"
                           name="sanction_date_{{$sanction['id']}}"
                           id="sanction_date_{{$sanction['id']}}" value="{{$sanction['date']}}">
                </td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary"><i class="fa fa-cogs"></i></a>
                        <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" style="padding: 10px" id="myDiv">

                            @foreach($sanction->infractions as $infractionSanction)
                                @php
                                    $infractionsIds[]=$infractionSanction->id;

                                @endphp
                            @endforeach
                            @foreach( $infractions as $ikey => $infractionIthem )
                               @if( in_array($infractionIthem->id,$infractionsIds))
                                    @php
                                        $selected="checked";
                                    @endphp
                                @else
                                    @php
                                        $selected="";
                                    @endphp
                                @endif
                                <li><p><input {{$selected}} type="checkbox" value="{{$infractionIthem->id}}" id="sanction{{$sanction['id']}}_infraction{{$ikey+1}}" name="sanction{{$sanction['id']}}_infraction{{$ikey+1}}">
                                        {{$infractionIthem->id}}{{$infractionIthem->infraction}}
                                    </p></li>
                                @endforeach
                                @php
                                    $infractionsIds=[];
                                @endphp

                        </ul>


                    </div>




                </td>
                <td>
                    <input type="date" class=" form-control form-control-sm"
                           name="sanction_date_d{{$id}}"
                           id="sanction_date_d{{$id}}" value="{{$sanction['sanction_date_d']}}">
                </td>
                <td>
                    <input type="date" class=" form-control form-control-sm"
                           name="sanction_date_f{{$id}}"
                           id="sanction_date_f{{$id}}" value="{{$sanction['sanction_date_f']}}">
                </td>
                <td>
                    <input type="checkbox" class=" form-control form-control-sm"
                           name="circonstance_pro{{$id}}"
                           id="circonstance_pro{{$id}}" {{$sanction['sanction_date_f'] ? "checked" : ""}}>

                </td>
                <td>
                    <input type="text" class=" form-control form-control-sm" size="5" step="0.1"
                           name="ethylotest{{$id}}"
                           id="ethylotest{{$id}}" value="{{$sanction['ethylotest']}}">





                </td>
                <td>
                    <input type="number" class=" form-control form-control-sm" size="5" step="0.1"
                           name="sangtest{{$id}}"
                           id="sangtest{{$id}}" value="{{$sanction['sangtest']}}">

                </td>
                <td>
                    <a href="sanction/delete/{{$sanction['id']}}">
                        <i class="material-icons" style="color:red">delete_forever</i>
                    </a>

                </td>
            </tr>




        @endforeach
        @endif
    </table>

</div>

