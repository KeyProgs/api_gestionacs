
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
                               <th  scope="col" >Nom</th>
                               <th  scope="col" >Prénom</th>
                               <th  scope="col" >Email</th>
                               <th  scope="col" >Cp</th>
                               <th  scope="col" >Date Naissance</th>
                               <th  scope="col" >Utilisateur</th>
                           </tr>
                        </thead>
                         <tbody>

                                 @foreach($clients as $client)
                                 <tr  style='cursor: pointer; cursor: hand;' onclick="window.location='/client/c-{{$client['id']}}';" >
                                     <th scope="row">{{$client['id']}}</th>
                                     <td>{{$client['nom']}}</td>
                                     <td>{{$client['prenom']}}</td>
                                     <td>{{$client['email']}}</td>
                                     <td>{{$client['cp']}}</td>
                                     <td>{{$client['dn']}}</td>
                                     <td>{{$client->user->name}}</td>
                                 </tr>
                                 @endforeach

                         </tbody>
                    </table>
                    <span>
                        {{$clients->appends(array('sort' => 'votes'))->links()}}
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
