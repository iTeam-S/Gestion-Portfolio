$(document).ready(function(){
    $('#updateFormations').hide();
    $('#updateExperiences').hide();
    $('#updateDistinctions').hide();
    $('#updateCompetences').hide();

    var idUpdateFormations = "";
    var idUpdateExperiences = "";
    var idUpdateDistinctions = "";
    var idUpdateCompetences = "";
    var idUpdateFonctions = "";

    // **************** FORMATIONS ************* FORMATIONS ************* FORMATIONS **************
    $('.formationsModifier').click(function(){
        let id = "";
        id = $(this).attr('id').split("_");
        idUpdateFormations = id[1];
        console.log(idUpdateFormations);
        $('#lieuUpdateFormations').val($('#lieuFormations_' + idUpdateFormations).text());
        $('#anneeUpdateFormations').val($('#anneeFormations_' + idUpdateFormations).text());
        $('#typeUpdateFormations').val($('#typeFormations_' + idUpdateFormations).text());
        $('#descriptionUpdateFormations').val($('#descriptionFormations_' + idUpdateFormations).text());
        $('#updateFormations').show(1000);
    });

    $('#confirmerUpdateFormations').click(function(){
        let donnees = {
            lieuUpdateFormations: $('#lieuUpdateFormations').val(),
            anneeUpdateFormations: $('#anneeUpdateFormations').val(),
            typeUpdateFormations: $('#typeUpdateFormations').val(),
            descriptionUpdateFormations: $('#descriptionUpdateFormations').val(),
            idFormationsUpdate: idUpdateFormations
        };
        $.post('/controllers/updates', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
                $('#formationsToShow').load('informations.php #formationsToShow');
                $('#updateFormations').hide();
            }
            else{
                console.log(data);
            }
        });
    });

    $('#annulerUpdateFormations').click(function(){
        $('#updateFormations').hide(1000);
        $('#lieuUpdateFormations').val("");
        $('#anneeUpdateFormations').val("");
        $('#typeUpdateFormations').val("");
        $('#descriptionUpdateFormations').val("");
    });

    // *************** EXPERIENCES ************ EXPERIENCES ************* EXPERIENCES *************
    $('.experiencesModifier').click(function(){
        let id = "";
        id = $(this).attr('id').split("_");
        idUpdateExperiences = id[1];
        $('#nomUpdateExperiences').val($('#nomExperiences_' + idUpdateExperiences).text());
        $('#anneeUpdateExperiences').val($('#anneeExperiences_' + idUpdateExperiences).text());
        $('#typeUpdateExperiences').val($('#typeExperiences_' + idUpdateExperiences).text());
        $('#descriptionUpdateExperiences').val($('#descriptionExperiences_' + idUpdateExperiences).text()); 
        $('#updateExperiences').show(1000);
    });

    $('#confirmerUpdateExperiences').click(function(){
        let donnees = {
            nomUpdateExperiences: $('#nomUpdateExperiences').val(),
            anneeUpdateExperiences: $('#anneeUpdateExperiences').val(),
            typeUpdateExperiences: $('#typeUpdateExperiences').val(),
            descriptionUpdateExperiences: $('#descriptionUpdateExperiences').val(),
            idExperiencesUpdate: idUpdateExperiences
        };
        $.post('/controllers/updates', donnees, function(data, status){
            if(status == 'success' && data == '1'){
                console.log(status);
                $('#experiencesToShow').load('informations.php #experiencesToShow');
                $('#updateExperiences').hide();
            }
            else{
                console.log(data);
            }
        });
    });

    $('#annulerUpdateExperiences').click(function(){
        $('#updateExperiences').hide(1000);
        $('#nomUpdateExperiences').val("");
        $('#anneeUpdateExperiences').val("");
        $('#typeUpdateExperiences').val("");
        $('#descriptionUpdateExperiences').val("");
    });

    // ************ DISTINCTIONS ************* DISTINCTIONS ************* DISTINCTIONS *************
    $('.distinctionsModifier').click(function(){
        let id = "";
        id = $(this).attr('id').split("_");
        idUpdateDistinctions = id[1];
        $('#organisateurUpdateDistinctions').val($('#organisateurDistinctions_' + idUpdateDistinctions).text());
        $('#anneeUpdateDistinctions').val($('#anneeDistinctions_' + idUpdateDistinctions).text());
        $('#typeUpdateDistinctions').val($('#typeDistinctions_' + idUpdateDistinctions).text());
        $('#descriptionUpdateDistinctions').val($('#descriptionDistinctions_' + idUpdateDistinctions).text());
        $('#ordreUpdateDistinctions').val($('#ordreDistinctions_' + idUpdateDistinctions).text());
        $('#updateDistinctions').show(1000);
    });

    $('#confirmerUpdateDistinctions').click(function(){
        let donnees = {
            organisateurUpdateDistinctions: $('#organisateurUpdateDistinctions').val(),
            anneeUpdateDistinctions: $('#anneeUpdateDistinctions').val(),
            typeUpdateDistinctions: $('#typeUpdateDistinctions').val(),
            descriptionUpdateDistinctions: $('#descriptionUpdateDistinctions').val(),
            ordreUpdateDistinctions: $('#ordreUpdateDistinctions').val(),
            idDistinctionsUpdate: idUpdateDistinctions
        };
        $.post('/controllers/updates', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
                $('#distinctionsToShow').load('informations.php #distinctionsToShow');
                $('#updateDistinctions').hide();
            }
            else{
                console.log(data);
            }
        });
    });

    $('#annulerUpdateDistinctions').click(function(){
        $('#updateDistinctions').hide(1000);
        $('#organisateurUpdateDistinctions').val("");
        $('#anneeUpdateDistinctions').val("");
        $('#typeUpdateDistinctions').val("");
        $('#descriptionUpdateDistinctions').val("");
        $('#ordreUpdateDistinctions').val("");
    });

    // ************** COMPETENCES ************** COMPETENCES ************ COMPETENCES *************
    $('.competencesModifier').click(function(){
        let id = "";
        id = $(this).attr('id').split("_");
        idUpdateCompetences = id[1];
        $('#nomUpdateCompetences').val($('#nomCompetences_' + idUpdateCompetences).text());
        $('#listeUpdateCompetences').val($('#listeCompetences_' + idUpdateCompetences).text());
        $('#updateCompetences').show(1000);
    });

    $('#confirmerUpdateCompetences').click(function(){
        if($('#iconeUpdateCompetences').val().trim().lenght !== 0){
            let donnees = {
                nomUpdateCompetences: $('#nomUpdateCompetences').val(),
                listeUpdateCompetences: $('#listeUpdateCompetences').val(),
                categorie: $('#iconeUpdateCompetences').val(),
                idCompetencesUpdate: idUpdateCompetences
            };
            $.post('/controllers/updates', donnees, function(data, status){
                if(status == "success" && data == '1'){
                    $('#competencesToShow').load('informations.php #competencesToShow');
                    $('#updateCompetences').hide();
                }
                else{
                    console.log(data);
                }
            });
        }
        else{
            alert("Veuillez choisir parmis les categories !\n\t\t\tMerci !");
        }
    });

    $('#annulerUpdateCompetences').click(function(){
        $('#updateCompetences').hide(1000);
        $('#nomUpdateCompetences').val("");
        $('#listeUpdateCompetences').val("");
        $('#iconeUpdateCompetences').val('0');
    });

    // ************* FONCTIONS ************* FONCTIONS ************* FONCTIONS **************
    $('.fonctionsModifier').click(function(){
        let id = "";
        id = $(this).attr('id').split('_');
        idUpdateFonctions = id[1];
    });

    $('#updateFonctions').click(function(){
        if($('#poste').val().trim().lenght !== 0){
            let donnees = {
                poste: $('#poste').val(),
                idFonctionsUpdate: idUpdateFonctions
            };
            console.log(donnees);
            $.post('/controllers/updates', donnees, function(data, status){
                if(status == 'success' && data == '1'){
                    $('#fonctionsToShow').load('informations.php #fonctionsToShow');
                    $('#fonctionsModal').modal('hide');
                }
                else{
                    console.log(data);
                }
            });
        }
        else{
            alert("Veuillez choisir de poste !\n\t\t\tMerci !");
        }
    });

    // ************ SUPPRESSION *************** SUPPRESSION *************** SUPPRESSION **************
    // ************ SUPPRESSION *************** SUPPRESSION *************** SUPPRESSION **************
    // ************ SUPPRESSION *************** SUPPRESSION *************** SUPPRESSION **************

    // ******************************* FORMATIONS ****************************
    $('.formationsSupprimer').click(function(){
        let id = $(this).attr('id');
        let idSupprimerFormations = id.split("_");
        console.log(idSupprimerFormations[1]);
        $('#formations_' + idSupprimerFormations[1]).remove();
        let donnees = {
            dataFormations: idSupprimerFormations[1]
        };
        $.post('/controllers/deletes', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
            }
            else{
                console.log(data);
            }
        });
    });

    // **************************** EXPERIENCES ***********************
    $('.experiencesSupprimer').click(function(){
        let id = $(this).attr('id');
        let idSupprimerExperiences = id.split('_');
        console.log(idSupprimerExperiences[1]);
        $('#experiences_' + idSupprimerExperiences[1]).remove();
        let donnees = {
            dataExperiences: idSupprimerExperiences[1]
        };
        $.post('/controllers/deletes', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
            }
            else{
                console.log(data);
            }
        });
    });

    // ************************** DISTINCTIONS *************************
    $('.distinctionsSupprimer').click(function(){
        let id = $(this).attr('id');
        let idSupprimerDistinctions = id.split('_');
        console.log(idSupprimerDistinctions[1]);
        $('#distinctions_' + idSupprimerDistinctions[1]).remove();
        let donnees = {
            dataDistinctions: idSupprimerDistinctions[1]
        };
        $.post('/controllers/deletes', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
            }
            else{
                console.log(data);
            }
        });
    });

    // ************************ COMPETENCES *************************
    $('.competencesSupprimer').click(function(){
        let id = $(this).attr('id');
        let idSupprimerCompetences = id.split('_');
        console.log(idSupprimerCompetences[1]);
        $('#competences_' + idSupprimerCompetences[1]).remove();
        let donnees = {
            dataCompetences: idSupprimerCompetences
        };
        $.post('/controllers/deletes', donnees, function(data, status){
            if(status == "success" && data == '1'){
                console.log(status);
            }
            else{
                console.log(data);
            }
        });
    });
});
