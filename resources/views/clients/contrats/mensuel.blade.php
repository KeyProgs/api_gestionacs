<style>
    body p {
        font-size: 12px;

    }

    .body {
        /*border: solid;*/
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }

    .asterisk {
        width: 90%;
        text-align: center;
        font-size: 8px !important;
    }

    .alnRight {
        text-align: right;
    }

    .alnCenter {
        text-align: center;
    }

    .tdBorder {
        border: solid 3px;
    }
</style>

<div class="body">
    <table border="0" width="100%">
        <tr>
            <td style="text-align:left;">
                <h1>{{ config('app.compagnie') }}</h1>
                {{ config('app.adresse') }} <br>
                {{ config('app.cp') }} {{ config('app.ville') }} <br>
                {{ config('app.telephone') }}
            </td>
            <td></td>
            <td class='alnRight'>
                <img src="{{asset('img/auto.png')}}" width="100px"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="tdBorder alnCenter">
                CONTRAT DE GESTION
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <p>Le souscripteur s'engage à déclarer en cours de contrat des qu'il en a connaissance :</p>
                <ul>
                    <li><p>Tout fait ou circonstance modifiant les déclarations faites lors de la souscription</p></li>
                    <li><p>
                            Toutes suspensions ou retrait de permis de conduire du (des) conducteur (s) désigné(s) quel
                            qu'en soitla durée ou les motifs
                        </p>
                    </li>
                    <li><p>Déménagement ou tout autre changement de situation</p></li>
                </ul>


                <p>A transmettre à l'assureur dans un délai de 30 jours les documents non fournis lors de la
                    souscription : </p>
                <ul>
                    <li><p>La photocopie de la carte grise du véhicule au nom du souscripteur</p></li>
                    <li><p>La photocopie recto verso du permis de conduire en cours de validé</p></li>
                    <li><p>L'original de votre relevé d'information datant de moins de 2 mois et couvrant vos 36
                            derniers
                            moisd'assurance (à réclamer à votre ancien assureur)</p>
                    </li>
                    <li><p>Le mandat de prélèvement joint complété et signé, accompagné d'un RIB, nécessaires au
                            paiement
                            devos prochaines échéances</p>
                    </li>
                    <li><p>
                            Un exemplaire des présentes dispositions particulières signées et paraphées par vos soins.
                        </p></li>
                </ul>


                <p>La société {{ config('app.compagnie') }} s'engage à gérer l'ensemble des contrats souscrits auprès de
                    cette dernière.
                    Pour la gestion des contrats la compagnie vous facture une cotisation de gestion prélevée selon
                    lefractionnement choisi sur votre compte bancaire.</p>


                <p><b>Mandat de prélèvement</b></p>

                <p>
                    J'autorise {{ config('app.compagnie') }} à prélever sur
                    le compte {{ $contrat->IBAN }} au titre descotisations à leurs échéances ainsi que les sommes
                    pouvant
                    être dues au titre du présent contrat. La référence unique du mandat est CGM{{ $contrat->id }} et le
                    numéro ics unique de
                    FR-ID{{$contrat->id}}
                </p>

                <b><p>Votre cotisation</p></b>


                <p>
                    La cotisation s'élève à {{$contrat->montant}} € qui sera prélevé mensuellement. Le prélévement
                    sera
                    effectué le {{$contrat->jourdeprelevent}} du mois sur le compte indiqué ci-dessus.<br>
                    Votre cotisation est présentée hors éventuelles
                    évolutions tarifaires réglementaires.<br>
                    Elle reste valable jusqu'à la date de prochaine échéance de votre
                    contrat.
                </p>


                <p>
                    {{$contrat->nom}} {{$contrat->prenom}}
                    demeurant {{$contrat->client->nomvoie}}  {{$contrat->client->typevoie}}  {{$contrat->client->rue}}  {{$contrat->client->ville}}  {{$contrat->client->cp}}
                    reconnais avoir
                    pris connaissance du présent document avant la conclusion du contrat d'assurance ci-joint mentionné
                    etdéclare avoir expressément accepté les conditions de souscriptions.
                </p>


                <p>
                    Fait en deux exemplaires,
                </p>


                <p>
                    A {{ config('app.ville') }}, Le  {{$contrat->created_at}}
                </p>


                <table width="100%" class="alnCenter" border="1">
                    <tr>
                        <td>
                            <p>
                                Signature de l'intermédiaire
                            </p>
                        </td>
                        <td>
                            <p>
                                Signature du souscripteur
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><br>
                        </td>
                        <td></td>
                    </tr>
                </table>

                <div>
                    <p class="asterisk">
                        En signant ce formulaire de mandat, vous autorisez Assurance Courtage Sérénité à envoyer des
                        instructions à votre banque pour débiter votre compte, et votrebanque à débiter votre compte
                        conformément aux instructions d'Assurance Courtage Sérénité . Vous bénéficiez du droit d’être
                        remboursé par votre banque suivantles conditions décrites dans la convention que vous avez
                        passée avec elle. Une demande de remboursement doit être présentée dans les 8 semaines suivant
                        la datede débit de votre compte pour un prélèvement autorisé
                    </p>
                </div>


            </td>
        </tr>

    </table>


    <table border="0" width="100%">
        <tr>
            <td style="text-align:left;">
                <h1>{{ config('app.compagnie') }}</h1>
                {{ config('app.adresse') }}<br>
                {{ config('app.cp') }} {{ config('app.ville') }}<br>
                {{ config('app.telephone') }}<br>
            </td>
            <td></td>
            <td class='alnRight'>
                <img src="{{asset('img/auto.png')}}" width="100px"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="tdBorder alnCenter">
                DISPOSITION GENERALES
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <p>
                    <b>AVANT DE CLASSER VOTRE CONTRAT, LISEZ-LE ATTENTIVEMENT</b>
                </p>


                <p>
                    <b>Article 1 :</b>
                </p>
                <p>
                    PIECESVous devez fournir tout les justiﬁcatifs demandés lors de l'établissement du ou des
                    contrat(s), Dans un délai de trente joursaﬁn d'éviter la résiliation du ou des contrat(s) par le
                    preneur
                    de risque.
                </p>
                <p>
                    <b>Article 2 :</b>
                </p>
                <p>
                    DEBUT ET FIN DE CONTRAT
                </p>
                <b>
                    <p>
                        Article 2.1:
                    </p>
                </b>
                <p>
                    DébutLa date de début de ce contrat est
                    celle à laquelle vous souscrivez votre premier contrat par le biais de notre société. Saufaccord
                    entre
                    les deux parties.
                </p>
                <p>
                    <b>Article 2.2 :</b> Durée
                </p>
                <p>
                    Ce contrat prend ﬁn lors de la résiliation de votre dernier contrat
                    souscrit et géré par notre société
                </p>
                <p>
                    <b>Article 3 :</b> COTISATION
                </p>
                <p>
                    <b>Article 3.1</b> : Quand et comment payer?
                </p>
                <p>
                    Les cotisations sont à payer par prélèvement à la date et fractionnement déﬁni lors de la
                    souscription
                    du
                    présent contrat.
                </p>
                <p>
                    <b>Article 3.2</b> : Révision du tarif
                </p>
                <p>
                    Nous pouvons être amenés à modiﬁer nos tarifs à la première échéance principale, lorsqu'au cours de
                    l'année vous avezplus de deux sinistres et, ou, en cas de changement de véhicule plus de deux fois
                    dans
                    l'année, l'augmentation n'excéderapas plus 2 euros
                    mensuel. Vous en serez informé lors de l'envoie de votre avis d'échéance. Vous aurez alors la
                    faculté
                    deprendre rendez vous pour l'explication de cette augmentation.
                </p>
                <p>
                    <b>Article 3.3</b> : Rejet de prélévement
                </p>
                <p>
                    Tout rejet de prélèvement entrainera des frais d'impayés,pouvant varier selon la durée et le montant
                    de
                    l'impayé.Assurance courtage sérénité se réserve le droit en cas de non régularisation de votre
                    impayé
                    dans les plus brefsdélais de ne plus exercer son devoir en tant que courtier.
                </p>
                <p>
                    <b>Article 3.4</b> : Résiliation non Paiement
                </p>
                <p>
                    Si vous ne payez pas la cotisation ou une fraction de cotisation dans les 10 jours de son
                    échéance, nous pouvonspoursuivre l’exécution du contrat en justice. Sous réserve de dispositions
                    plus
                    favorables, la loi nous autoriseégalement à suspendre les garanties de votre contrat 30 jours après
                    l’envoi d’une lettre recommandée de mise endemeure à votre dernier domicile connu, voire à résilier
                    votre contrat 10 jours après l’expiration de ce délai de 30jours (article L113-3 du Code des
                    assurances).En cas de résiliation, vous restez redevable de la portion de cotisation aﬀérente à la
                    période écoulée jusqu’à la datede résiliation, majorée des frais de poursuites et de recouvrement
                    éventuels ainsi que d’une pénalité correspondantà 6 mois de cotisation maximum sans pouvoir excéder
                    la
                    portion de cotisation restant due jusqu’au terme del’échéance annuelle.
                </p>

                <div>
                    <p class="asterisk">
                        Les informations contenues dans
                        le présent document ne sont destinées à être utilisées par ASSURANCE COURTAGE SERENITE que pour
                        la
                        gestion de la relation avecson client. Elles pourront donner lieu à l'exercice par ce dernier de
                        ses
                        droits d'opposition, d'accès et de rectiﬁcation tels que prévus aux articles 38 et suivants de
                        laLoi
                        n°78-17 du 6 janvier 1978 modiﬁée relative à l'informatique. Ce mandat vaut pré-notiﬁcation pour
                        les
                        prochains prélèvements SEPA qui seront eﬀectués dans lesconditions décrites dans vos conditions
                        particulière
                    </p>
                </div>
            </td>
        </tr>


    </table>


</div>
