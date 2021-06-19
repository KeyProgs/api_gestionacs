
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>

    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0"><h1>Liste Des clients</h1>

                    <table class="table table-hover">
                        <thead  class="thead-light">
                           <tr>
                               <th  scope="col" >#</th>
                               <th  scope="col" >Nom</th>
                               <th  scope="col" >Prénom</th>
                               <th  scope="col" >Email</th>
                               <th  scope="col" >Cp</th>
                               <th  scope="col" >Date Naissance</th>
                               <th  scope="col" >Utilisateur</th>
                               <th  scope="col" >Actions</th>
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
                                     <td>
                                         <a href="{{url('client/delete/'.$client->id)}}" onclick="return confirm('Vous etes sure de vouloir suprimer ?')" >
                                             <span class="badge badge-pill badge-danger">Suprimer</span>
                                         </a>
                                         <a href=""><span class="badge badge-pill badge-primary">Modifier</span></a>


                                     </td>
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
