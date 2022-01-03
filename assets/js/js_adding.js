$(document).ready(function(){
    // ******************** les informations pour les formations *********************
    var lieuFormation = [];
    var anneeFormation = [];
    var typeFormation = [];
    var descriptionFormation = [];

    $("#ajouterFormations").click(function(){
        if($('#lieuFormation').val().trim().length !== 0 && $('#anneeFormation').val().trim().length !== 0 && $('#typeFormation').val().trim().length !== 0){
            lieuFormation.push($('#lieuFormation').val());
            anneeFormation.push($('#anneeFormation').val());
            typeFormation.push($('#typeFormation').val());
            descriptionFormation.push($('#descriptionFormation').val());
            $('#lieuFormation').val("");
            $('#anneeFormation').val("");
            $('#typeFormation').val("");
            $('#descriptionFormation').val("");
        }
        else{
            alert("Veuillez remplir les champs: lieu, année, type !!!");
        }
    });

    $('#sendFormations').click(function(){
        if($('#lieuFormation').val().trim().length !== 0 && $('#anneeFormation').val().trim().length !== 0 && $('#typeFormation').val().trim().length !== 0){
            lieuFormation.push($('#lieuFormation').val());
            anneeFormation.push($('#anneeFormation').val());
            typeFormation.push($('#typeFormation').val());
            descriptionFormation.push($('#descriptionFormation').val());

            let donnees = {
                lieuF: lieuFormation,
                anneeF: anneeFormation,
                typeF: typeFormation,
                descriptionF: descriptionFormation
            };
            $.post('/controllers/adding', donnees, function(data, status){
                if(status == "success"){
                    console.log(donnees);
                    alert('Sauvegarder avec succès !!!');
                    $('#formationsModal').modal('hide');
                    lieuFormation = [];
                    anneeFormation = [];
                    typeFormation = [];
                    descriptionFormation = [];
                    $('#lieuFormation').val("");
                    $('#anneeFormation').val("");
                    $('#typeFormation').val("");
                    $('#descriptionFormation').val("");
                    $('#formationsToShow').load('informations.php #formationsToShow');
                }
                else{
                    console.log(data);
                }
            });
        }
        else{
            alert("Veuillez remplir les champs: lieu, année, type ...!!!");
        }
    });

    // ************************* les inforamtions pour les expériences *********************
    var nomOrganisation = [];
    var anneeExperience = [];
    var typeExperience = [];
    var descriptionExperiences = [];

    $("#ajouterExperiences").click(function(){
        if($('#nomOrganisation').val().trim().length !== 0 && $('#nomOrganisation').val().trim().length !== 0 && $('#typeExperience').val().length !== 0){
            nomOrganisation.push($('#nomOrganisation').val());
            anneeExperience.push($('#anneeExperience').val());
            typeExperience.push($('#typeExperience').val());
            descriptionExperiences.push($('#descriptionExperiences').val());
            $('#nomOrganisation').val("");
            $('#anneeExperience').val("");
            $('#typeExperience').val("");
            $('#descriptionExperiences').val("");
        }
        else{
            alert("Veuillez remplir les champs: nom d'organisation, année, type !!!");
        }
    });

    $('#sendExperiences').click(function(){
        if($('#nomOrganisation').val().trim().length !== 0 && $('#nomOrganisation').val().trim().length !== 0 && $('#typeExperience').val().length !== 0){
            nomOrganisation.push($('#nomOrganisation').val());
            anneeExperience.push($('#anneeExperience').val());
            typeExperience.push($('#typeExperience').val());
            descriptionExperiences.push($('#descriptionExperiences').val());

            let donnees = {
                nomE: nomOrganisation,
                anneeE: anneeExperience,
                typeE: typeExperience,
                descriptionE: descriptionExperiences
            };
            $.post('/controllers/adding', donnees, function(data, status){
                if(status == "success"){
                    console.log(donnees);
                    alert('Sauvegarder avec succès !!!');
                    $('#experiencesModal').modal('hide');
                    nomOrganisation = [];
                    anneeExperience = [];
                    typeExperience = [];
                    descriptionExperiences = [];
                    $('#nomOrganisation').val("");
                    $('#anneeExperience').val("");
                    $('#typeExperience').val("");
                    $('#descriptionExperiences').val("");
                    $('#experiencesToShow').load('informations.php #experiencesToShow');
                }
                else{
                    console.log(data);
                }
            });
        }
        else{
            alert("Veuillez remplir les champs: nom d'organisation, année, type ...!!!");
        }
    });

    
    // ************************** les informations pour les distinctions *******************************
    var organisateurs = [];
    var anneeDistinction = [];
    var typeDistinction = [];
    var descriptionDistinction = [];
    var rangDistinction = [];

    $('#ajouterDistinctions').click(function(){
        if($('#organisateurs').val().trim().length !== 0 && $('#anneeDistinction').val().trim().length !== 0 && $('#typeDistinction').val().trim().length !== 0 && $('#rangDistinction').val().trim().length !== 0){
            organisateurs.push($('#organisateurs').val());
            anneeDistinction.push($('#anneeDistinction').val());
            typeDistinction.push($('#typeDistinction').val());
            descriptionDistinction.push($('#descriptionDistinction').val());
            rangDistinction.push($('#rangDistinction').val());
            $('#organisateurs').val("");
            $('#anneeDistinction').val("");
            $('#typeDistinction').val("");
            $('#descriptionDistinction').val("");
            $('#rangDistinction').val("");
        }
        else{
            alert("Veuillez remplir les champs: organisateurs, année, type, rang !!!");
        }
    });

    $('#sendDistinctions').click(function(){
        if($('#organisateurs').val().trim().length !== 0 && $('#anneeDistinction').val().trim().length !== 0 && $('#typeDistinction').val().trim().length !== 0 && $('#rangDistinction').val().trim().length !== 0){
            let donnees = {
                nomD: organisateurs,
                anneeD: anneeDistinction,
                typeD: typeDistinction,
                descriptionD: descriptionDistinction,
                rangD: rangDistinction
            };
            $.post('/controllers/adding', donnees, function(data, status){
                if(status == "success"){
                    console.log(donnees);
                    alert('Sauvegarder avec succès !!!');
                    $('#distinctionsModal').modal('hide');
                    organisateurs = [];
                    anneeDistinction = [];
                    typeDistinction = [];
                    descriptionDistinction = [];
                    rangDistinction = [];
                    $('#organisateurs').val("");
                    $('#anneeDistinction').val("");
                    $('#typeDistinction').val("");
                    $('#descriptionDistinction').val("");
                    $('#rangDistinction').val("");
                    $('#distinctionsToShow').load('informations.php #distinctionsToShow');
                }
            });
        }
        else{
            alert("Veuillez remplir les champs: organisateurs, année, type, rang...!!!");
        }
    });

    // ********************************** les informations pour les competences *****************************
    var icones_categories = [];
    var mes_competences = [];
    var descritpionCompetences = [];

    $('#ajouterCompetences').click(function(){
        if($('#icones_categories').val().trim().length !== 0 && $('#mes_competences').val().trim().length !== 0 && $('#descritpionCompetences').val().trim().length !== 0){
            icones_categories.push($('#icones_categories').val());
            mes_competences.push($('#mes_competences').val());
            descritpionCompetences.push($('#descritpionCompetences').val());
            $('#icones_categories').val("0");
            $('#mes_competences').val("");
            $('#descritpionCompetences').val("");
        }
        else{
            alert("Veuillez rempir tous les champs...!!!");
        }
    });

    $('#sendCompetences').click(function(){
        if($('#icones_categories').val().trim().length !== 0 && $('#mes_competences').val().trim().length !== 0 && $('#descritpionCompetences').val().trim().length !== 0){
            let donnees = {
                iconeC: icones_categories,
                competences: mes_competences,
                descriptionC: descritpionCompetences
            };
            $.post('/controllers/adding', donnees, function(sata, status){
                if(status == "success"){
                    console.log(donnees);
                    alert('Sauvegarder avec succès !!!');
                    $('#competencesModal').modal('hide');
                    icones_categories = [];
                    mes_competences = [];
                    descritpionCompetences = [];
                    $('#icones_categories').val("0");
                    $('#mes_competences').val("");
                    $('#descritpionCompetences').val("");
                    $('#competencesToShow').load('informations.php #competencesToShow');
                }
            });
        }
        else{
            alert("Veuillez rempir tous les champs...!!!");
        }
    });
});
