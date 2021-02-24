
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="/addaction" METHOD="POST">
                @csrf


            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter Actions à faire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Actions</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Retours</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">En traitement</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                            <table class="row  form-row col-md-12">
                                <tr>
                                    <td colspan="2">Action</td>
                                    <td>
                                        <select id="id_action_type" name="id_action_type" class=" form-control form-control-sm"
                                                onchange="changeStatus({{$action['id']}},this.value)" >
                                            @foreach($action_types as $action_type)
                                                <option  value="{{$action_type->id}}">{{$action_type->id}} {{$action_type->titre}}</option>
                                            @endforeach
                                        </select>                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2">Titre</td>
                                    <td>
                                        <input class=" form-control form-control-sm" type="text" name="titre" id="titre" placeholder="Titre d'actions"  >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Date début</td>
                                    <td>
                                        <input class=" form-control form-control-sm" type="date" name="dd" id="dd" placeholder="Titre d'actions" value="{{date('Y-m-d')}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Date fin</td>
                                    <td>
                                        <input class=" form-control form-control-sm" type="date" name="df" id="df" placeholder="Titre d'actions"  value="{{date('Y-m-d')}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Résponsable</td>
                                    <td>
                                        <select class=" form-control form-control-sm" type="text" id="responsable" name="responsable">
                                            @foreach($users as $user)
                                                <option id="{{$user->id}}">{{$user->id }} {{$user->name  }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Déscription</td>
                                    <td>
                                        <textarea name="description" id="description" class=" form-control form-control-sm" ></textarea>
                                    </td>
                                </tr>
                            </table>




                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    okk
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="profile-tab">
                    okkkk
                    </div>




                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>
