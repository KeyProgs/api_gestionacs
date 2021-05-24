// var setData={
//     'name':document.getElementById('Accounts_editView_fieldName_accountname').value,
//     'cp':document.getElementById('Accounts_editView_fieldName_cf_779').value,
//     'dn':document.getElementById('Accounts_editView_fieldName_cf_799').value,
//     'ville':document.getElementById('Accounts_editView_fieldName_cf_781').value,
//     'activite':document.getElementById('Accounts_editView_fieldName_cf_763').value,
//     'email':document.getElementById('Accounts_editView_fieldName_cf_845').value,
//     'mobile':document.getElementById('Accounts_editView_fieldName_phone').value,
//     'fixe':document.getElementById('Accounts_editView_fieldName_phone').value,
//     'matricule':"AB-274-MQ",
//     'titulaire':"1",
//     'usage':"1"
// }


function GetById(id) {
    if (document.getElementById(id)) return document.getElementById(id).value ? document.getElementById(id).value : null
}

if (document.getElementById('station_cp_n')) {

    let setData = {
        'civilite': GetById('civilite'),
        'name': GetById('nom'),
        'prenom': GetById('prenom'),
        'dn': GetById('dn'),
        'rue': GetById('rue'),
        'typevoie': GetById('typevoie'),
        'nomvoie': GetById('nomvoie'),
        'cp': GetById('cp'), ////////////////////////////////
        'ville': GetById('ville'),
        'activite_id': GetById('activite_id'),
        'email': GetById('email'),
        'indicatif': GetById('indicatif'),
        'portable': GetById('portable'),
        'fixe': GetById('fixe'),
        'adresse': GetById('adresse'),


        'matricule': GetById('matricule'),
        'sitfam_id': GetById('sitfam_id'),
        'financement_id': GetById('financement_id'),
        'usage_id': GetById('usage_id'),
        'station_cp_n': GetById('station_cp_n'),
        'station_ville_n': GetById('station_ville_n'),
        'station_cp_j': GetById('station_cp_j'),
        'station_ville_j': GetById('station_ville_j'),
        'km_range': GetById('km_range'),
        'titulairecartegrise': GetById('titulairecartegrise'),
        'typepermis': GetById('typepermis'),
        'dop': GetById('dop'),
        'etat_assurance': GetById('etat_assurance'),
        'usage': GetById('usage'),
        'station_id': GetById('station_id'),
        'date_acqui': GetById('date_acqui'),
        'date_contrat': GetById('date_contrat'),
        'last3y_assure': GetById('last3y_assure'),
        'last3y_interruption': GetById('last3y_interruption'),
        'assureur_resiliation': GetById('assureur_resiliation'),

        'nb_sinistres': GetById('nb_sinistres')

    }

/////////sinistres
    sinistres = null;
    setData['sinistres'] = {};
    var i = 0;
    for (i = 1; i <= GetById('nb_sinistres'); i++) {
        sinistre_date = "sinistre_date_" + i;
        sinistre_id = "sinistre_id_" + i;
        setData[sinistre_date] = GetById(sinistre_date);
        setData[sinistre_id] = GetById(sinistre_id);
        sinistre = {
            [sinistre_date]: GetById(sinistre_date),
            [sinistre_id]: GetById(sinistre_id)

        };


        // setData['sinistres'].push({sinistre_id:sinistre});

    }


    chrome.storage.sync.set({"setData": setData});
// alert (setData.name + " Tarification Disponible !");
    console.log(setData.name + " Tarification Disponible !");
    console.log("setData.js");
    console.log(setData);
}

var setData__ = null;



