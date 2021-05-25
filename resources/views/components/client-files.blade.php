<div class="col-md-12">
    <table class="table table-hover" >
        <tr>
            <th>ID</th>
            <th>Doc</th>
            <th>Affaire</th>
        </tr>

        @foreach($uploads as $key=>$upload)
            <tr class="thead-dark " style="text-align: left">

                <td colspan="2">
                    <a href="../../getfile/{{$upload->path}}">
                    <span class="fa fa-download">

                        {{$upload->titre}}
                    </a>
                </td>

                <td>{{$upload->affaire->titre}}</td>
            </tr>

        @endforeach

    </table>


    <br><br>
    <div class="container">
        <form action="uploads" method="post" enctype="multipart/form-data">
            @csrf
            document a importer :
            <input class=" form-control form-control-sm" type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="titre" id="titre">
            <input type="hidden" name="client_id" id="client_id" value="{{$clientId}}">
            <input type="hidden" name="affaire_id" id="affaire_id" value="{{$clientId}}">
            <input class="btn btn-primary" type="submit" value="Importer Document" name="Envoyer"/>
        </form>
    </div>
</div>
