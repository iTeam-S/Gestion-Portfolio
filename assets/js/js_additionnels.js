$(document).ready(function()
{
    $("#formation").hide();
    $("#experience").hide();
    $("#competence").hide();
    $('#register').hide();

    $("#bouttonMembre button").click(function()
    {   
        // if($('#nomPersonne').val().length === 0)
        // {
        //     alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        // }

        // else if($('#prenomsPersonne').val().length === 0)
        // {
        //     alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        // }

        // else if($('#prenomUsuel').val().length === 0)
        // {
        //     alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        // }

        // else if($('#telephonePrimo').val().length === 0)
        // {
        //     alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        // }

        // else if($('#email').val().length === 0)
        // {
        //     alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        // }

        // else
        // {
                $("#membre").hide(1000);
                $("#formation").show(1000);
        // }
    });


    //----------------------------------------------------- formation ---------------------------

    var lieuFormation = [];
    var anneeFormation = [];
    var typeFormation = [];
    var descriptionFormation = [];

    $("#bouttonFormation .ajouter button").click(function()
    {
        lieuFormation.push($('#lieuFormation').val());
        anneeFormation.push($('#anneeFormation').val());
        typeFormation.push($('#typeFormation').val());
        descriptionFormation.push($('#descriptionFormation').val());

        $('#lieuFormation').val("");
        $('#anneeFormation').val("");
        $('#typeFormation').val("");
    });

    $("#bouttonFormation .suivant button").click(function()
    {   
        
        lieuFormation.push($('#lieuFormation').val());
        anneeFormation.push($('#anneeFormation').val());
        typeFormation.push($('#typeFormation').val());
        descriptionFormation.push($('#descriptionFormation').val());

        $("#formation").hide(1000);
        $("#competence").show(1000);
    });

    $("#bouttonFormation .precedant button").click(function()
    {
        $('#lieuFormation').val("");
        $('#anneeFormation').val("");
        $('#typeFormation').val("");
        $('#descriptionFormation').val("");
        lieuFormation = [];
        anneeFormation = [];
        typeFormation = [];
        descriptionFormation = [];

        $("#formation").hide(1000);
        $("#membre").show(1000);
    });


    // ---------------------------------------------- competence ----------------------------------
    var icones_categories = [];
    var mes_competences = [];
    var descritpionCompetences = [];

    $('#bouttonCompetence .ajouter button').click(function()
    {
        icones_categories.push($('#icones_categories').val());
        mes_competences.push($('#mes_competences').val());
        descritpionCompetences.push($('#descritpionCompetences').val());
        $('#icones_categories').val("0");
        $('#mes_competences').val("");
        $('#descritpionCompetences').val("");
    });

    $("#bouttonCompetence .suivant button").click(function()
    {
        // if($('#stylo').val().length === 0)
        // {
        //     alert("Tous ces champs sont obligatoires veuillez les remplir...!");
        // }

        // else if($('#mobile').val().length === 0)
        // {
        //     alert("Tous ces champs sont obligatoires veuillez les remplir...!");
        // }

        // else if($('#parametre').val().length === 0)
        // {
        //     alert("Tous ces champs sont obligatoires veuillez les remplir...!");
        // }
        
        // else if($('#laptop').val().length === 0)
        // {
        //     alert("Tous ces champs sont obligatoires veuillez les remplir...!");
        // }
        
        // else
        // {
                icones_categories.push($('#icones_categories').val());
                mes_competences.push($('#mes_competences').val());
                descritpionCompetences.push($('#descritpionCompetences').val());
                $("#competence").hide(1000);
                $("#experience").show(1000);

        // }
    });

    $("#bouttonCompetence .precedant button").click(function()
    {
        $('#icones_categories').val("0");
        $('#mes_competences').val("");
        $('#descritpionCompetences').val("");
        icones_categories = [];
        mes_competences = [];
        descritpionCompetences = [];

        $("#competence").hide(1000);
        $("#formation").show(1000);
    });


    //----------------------- Expérience -----------------------------

    var nomOrganisation = [];
    var anneeExperience = [];
    var typeExperience = [];
    var descriptionExperiences = [];

    $("#bouttonExperience .ajouter button").click(function()
    {
        nomOrganisation.push($('#nomOrganisation').val());
        anneeExperience.push($('#anneeExperience').val());
        typeExperience.push($('#typeExperience').val());
        descriptionExperiences.push($('#descriptionExperiences').val());
        $('#nomOrganisation').val("");
        $('#anneeExperience').val("");
        $('#typeExperience').val("");
        $('#descriptionExperiences').val("");
    });

    $("#bouttonExperience .precedant button").click(function()
        {
            $('#nomOrganisation').val("");
            $('#anneeExperience').val("");
            $('#typeExperience').val("");
            $('#descriptionExperiences').val("");
            nomOrganisation = [];
            anneeExperience = [];
            typeExperience = [];
            descriptionExperiences = [];

            $("#experience").hide(1000);
            $("#competence").show(1000);
    });
    $('#bouttonExperience .suivant button').click(function()
    {
        nomOrganisation.push($('#nomOrganisation').val());
        anneeExperience.push($('#anneeExperience').val());
        typeExperience.push($('#typeExperience').val());
        descriptionExperiences.push($('#descriptionExperiences').val());
        $('#register').show(1000);
    });
        
    //-------------------------- LES DONNEES ---------------------------------

    var donnees = {
        //------------------ Membres --------------------------
        nomPersonne: $('#nomPersonne').val(),
        prenomsPersonne: $('#prenomsPersonne').val(),
        prenomUsuel: $('#prenomUsuel').val(),
        telephonePrimo: $('#telephonePrimo').val(),
        telephoneSecondo: $('#telephoneSecondo').val(),
        domicile: $('#domicile').val(),
        email: $('#email').val(),
        lien_cv: $('#lien_cv').val(),
        fonction: $('#fonction').val(),
        descriptionTravail: $('#descriptionTravail').val(),
        lien_linkedin: $('#lien_linkedin').val(),
        lien_github: $('#lien_github').val(),
        githubAvatar:$('#githubAvatar').val(),
        lien_facebook: $('#lien_facebook').val(),
        //------------------- formation ---------------------------
        lieuF: lieuFormation,
        anneeF: anneeFormation,
        typeF: typeFormation,
        descriptionF: descriptionFormation,
        //-------------------- Competences ------------------------
        iconeC: icones_categories,
        competences: mes_competences,
        descriptionC: descritpionCompetences,
        //------------------- Experience ------------------------
        nomE: nomOrganisation,
        anneeE: anneeExperience,
        typeE: typeExperience,
        descriptionE: descriptionExperiences
    };

    $('#register').click(function()
    {
        console.log(donnees);
        $.post( "../controllers/new_controllers.php", donnees, function( data )
        {
            $('body').hide();
            alert("Success...!");
            $('#nomPersonne').val("");
            $('#prenomsPersonne').val("");
            $('#prenomUsuel').val("");
            $('#telephonePrimo').val("");
            $('#telephoneSecondo').val("");
            $('#domicile').val("");
            $('#email').val("");
            $('#lien_cv').val("");
            $('#fonction').val("");
            $('#descriptionTravail').val("");
            $('#lien_linkedin').val("");
            $('#lien_github').val("");
            $('#githubAvatar').val("");
            $('#lien_facebook').val("");
            //------------------- formation ---------------------------
            lieuFormation = [];
            anneeFormation = [];
            typeFormation = [];
            descriptionFormation = [];
            //-------------------- Competences ------------------------
            icones_categories = [];
            mes_competences = [];
            descritpionCompetences = [];
            //------------------- Experience ------------------------
            nomOrganisation = [];
            anneeExperience = [];
            typeExperience = [];
            descriptionExperiences = [];
        });
    });
});
