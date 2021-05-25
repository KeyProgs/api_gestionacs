
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0"><h1>Liste Des clients</h1>

                <table class="table table-hover">
                    <thead  class="thead-light ">
                    <tr>
                        <th  scope="col" >#</th>
                        <th  scope="col" >Affaire</th>
                        <th  scope="col" >Nom</th>
                        <th  scope="col" >Prenom</th>
                        <th  scope="col" >Date</th>
                        <th  scope="col" >Documents</th>
                        <th  scope="col" >Gestionnaire</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($affaires as $affaire)
                    <tr  style='cursor: pointer; cursor: hand;' _onclick="window.location='/client/c-';" >
                        <th scope="row">{{$affaire->id}}</th>
                        <td>{{$affaire->titre}}</td>
                        <td>{{$affaire->client->nom}}</td>
                        <td>{{$affaire->client->prenom}}</td>
                        <td>{{$affaire->created_at}}</td>
                        <td>{{sizeof($affaire->client->uploads)}}</td>
                        <td>{{$affaire->user->name}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <span>
{{--                        {{$affaires->appends(array('sort' => 'votes'))->links()}}--}}
                    </span>

                </p>
            </div>
        </div>
    </div>
</div>
<style>
    .w-5{
        display: none;
    }
</style>
@stop


<script>
    jQuery( document ).ready(function() {
        $("#container").on('click-row.bs.table', function (e, row, $element) {
            window.location = $element.data('href');
        });
    });


</script>
