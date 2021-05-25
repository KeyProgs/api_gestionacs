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
        <form id="validations_form" class="row  form-row col-md-12 row justify-content-between"
              action="/pointeuse/validations" method="POST">
            @csrf


            <select name="user" id="user" onchange="document.getElementById('validations_form').submit();">
                <option>Membres d equipe</option>
                @foreach($users as $user)
                    <option @if($user_id==$user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <select name="mois" id="mois" onchange="document.getElementById('validations_form').submit();">
                @php $mois_id<1? $mois_id=date('m'):0  @endphp
                @for($mois=1 ; $mois<13;$mois++)
                    <option @if($mois_id==$mois) selected @endif value="{{$mois}}">mois {{$mois}}</option>
                @endfor

            </select>

        </form>
        @if($user_id)
            <form id="validations_form" class="row  form-row col-md-12 row justify-content-between"
                  action="/pointeuse/setValidations" method="POST">
                @csrf
                <input type="hidden" name="user" value="{{$user_id}}"/>
                <input type="hidden" name="mois" value="{{$mois_id}}"/>

                <table class="table table-hover">
                    <thead class="thead-light ">
                    <tr>
                        <th scope="col">Jour</th>
                        <th scope="col">Pointeuse</th>
                        <th scope="col">Calculue Auto</th>
                        <th scope="col">Validation</th>
                        <th scope="col">Taches associes</th>
                        <th scope="col">Notes</th>

                    </tr>
                    </thead>
                    <tbody>


                    @for($day=1;$day<32;$day++)
                        <tr style='cursor: pointer; cursor: hand;'>
                            <th id="trAction" class="" scope="row">
                                {{$day}}/{{$mois_id}}
                                {{date('D', strtotime("2021-$mois_id-$day"))}}


                            </th>
                            <td>
                                <table>
                                    @foreach($pointeuses as $pointeuse)
                                        @php
                                            $dayPointeuse = date('d', strtotime($pointeuse['created_at']));
                                            $monthPointeuse = date('m', strtotime($pointeuse['created_at']))
                                        @endphp
                                        @if($dayPointeuse==$day)
                                            @foreach($pointeuse->dayHours() as $block)
                                                <tr>
                                                    <td>
                                                        <span
                                                            class="badge badge-pill badge-success">{{$block['hourIn']}}</span>
                                                        <span
                                                            class="badge badge-pill badge-secondary">{{$block['hourOut']}}</span>
                                                        <span
                                                            class="badge badge-pill badge-info">{{$block['diff']}}</span>


                                                    </td>
                                                </tr>
                                            @endforeach
                                            @break
                                        @endif
                                    @endforeach
                                </table>
                            </td>
                            <td>
                                <span class="badge badge-pill badge-info">
                                {{sizeof($pointeuses)>0? $pointeuses[0]->dayHoursAuto($day ): 0 }}
                                </span>

                            </td>
                            <td>


                                <input type="number" size="4" width="4" name="dayValideHours_{{$day}}" step="0.25"  class="form-control"
                                       value="{{sizeof($pointeuses)>0? $pointeuses[0]->heuresvalides($day): 0 }}">

                            </td>
                            <td>
                                @foreach($pointer->actions($mois_id,$day,$user_id) as $action)

                                    <a href="../taches" class="badge badge-warning">
                                        {{$action->titre }}
                                    </a>

                                    <br>

                                @endforeach
                            </td>
                            <td>
                                <textarea id="note_{{$day}}" name="note_{{$day}}" class="form-control">
                                    {{sizeof($pointeuses)>0? $pointeuses[0]->getNote($day) : '/' }}
                                </textarea>
                            </td>

                        </tr>
                    @endfor

                    </tbody>
                </table>


                <input type="submit" class="btn btn-success" value="Enregistrer"/>
            </form>
        @endif
    </div>

@stop



<style>


</style>



