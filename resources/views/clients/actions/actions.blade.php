@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Actions Liste</h1>
@stop


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">
                    <h1>Liste Des Tâches</h1>

                    <table class="table table-hover">
                        <thead class="thead-light ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Date début</th>
                            <th scope="col">date Fin</th>
                            <th scope="col">Rapporteur</th>
                            <th scope="col">Reponsable</th>
                            <th scope="col">Action Type</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($actions as $action)

                            <tr style='cursor: pointer; cursor: hand;' >
                                <th  id="trAction{{$action['id']}}"class="{{$action->getActionetat->color}}" scope="row">
                                    <select id="etat_id" name="changeStatus" class=" form-control form-control-sm"
                                            onchange="changeStatus({{$action['id']}},this.value)">
                                        @foreach($Action_etats as $Action_etat)
                                            <option @if($action->getActionEtat->titre ==$Action_etat->titre ) selected
                                                    @endif value="{{$Action_etat->id}}">{{$Action_etat->titre}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <td>{{$action['titre']}}</td>
                                <td>{{$action['dd']}}</td>
                                <td>{{$action['df']}}</td>
                                <td>{{$action->getRapporteur->name}}</td>
                                <td>
                                    <select id="reponsable" name="reponsable" class=" form-control form-control-sm"
                                            onchange="changeReponsable({{$action['id']}},this.value)">
                                        @foreach($users as $user)
                                            <option @if($action->getResponsable->name ==$user->name ) selected
                                                    @endif value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>

                                  </td>

                                <td>{{$action->typeaction->titre}}</td>
                                <td>{{$action->description}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <span>
                        {{$actions->appends(array('sort' => 'votes'))->links()}}
                    </span>

                    </p>
                    @include('clients.actions.add_action')
                    <div class="col-3 mt-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            + Action
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .w-5 {
            display: none;
        }
    </style>

@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">


    function changeStatus(action_id, etat_id) {
        // console.log(action_id + '** '+etat_id + "////////////");
        $.ajax({
            url: "/change_action_etat",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                action_id: action_id,
                etat_id: etat_id,
            },
            success: function (response ) {
                trAction=document.getElementById('trAction'+action_id);

                trAction.classList.remove(trAction.classList);
                trAction.classList.add(response)
                console.log(response);
            },
        });
    }

    function changeReponsable(action_id, etat_id) {
        // console.log(action_id + '** '+etat_id + "////////////");
        $.ajax({
            url: "/change_reponsable",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                action_id: action_id,
                responsable: etat_id,
            },
            success: function (response) {

                console.log('++'+response);
            },
        });
    }


    $(document).ready(function () {

    });


</script>
