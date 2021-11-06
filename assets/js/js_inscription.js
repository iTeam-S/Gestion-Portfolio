$(document).ready(function()
{
    $("#formation").hide();
    $("#experience").hide();
    $("#competence").hide();
    $("#distinction").hide();
    $('#register').hide();

    $("#bouttonMembre button").click(function()
    {   
        if($('#nomPersonne').val().trim().length === 0)
        {
            alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        }

        else if($('#prenomsPersonne').val().trim().length === 0)
        {
            alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        }

        else if($('#prenomUsuel').val().trim().length === 0)
        {
            alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        }

        else if($('#telephonePrimo').val().trim().length === 0)
        {
            alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        }

        else if($('#email').val().trim().length === 0)
        {
            alert("Veuillez remplir les champs obligatoires: nom, prenoms, telephone et adresse email. Merci !");
        }

        else
        {
            $("#membre").hide(1000);
            $("#formation").show(1000);
        }
    });


    //--------------------------------- formation -----------------------------

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


    // ---------------------------------- competence ----------------------------------
    var icones_categories = [];
    var mes_competences = [];
    var descritpionCompetences = [];
    

    $('#bouttonCompetence .ajouter button').click(function()
    {
        icones_categories.push($('#icones_categories').val());
        mes_competences.push($('#mes_competences').val());
        descritpionCompetences.push($('#descritpionCompetences').val());
        $('#icones_categories').val("");
        $('#mes_competences').val("");
        $('#descritpionCompetences').val("");
    });

    $("#bouttonCompetence .suivant button").click(function()
    {
        if($('#icones_categories').val().trim().length === 0)
        {
            alert("Veuillez choisir sur les icônes ...!");
        }

        else if($('#mes_competences').val().trim().length === 0)
        {
            alert("Tous ces champs sont obligatoires, veuillez les remplir...!");
        }

        else if($('#descritpionCompetences').val().trim().length === 0)
        {
            alert("Tous ces champs sont obligatoires, veuillez les remplir...!");
        }

        else if($('#poste').val().trim().length === 0)
        {
            alert("Veuillez choisir votre poste...!");
        }

        else
        {
            icones_categories.push($('#icones_categories').val());
            mes_competences.push($('#mes_competences').val());
            descritpionCompetences.push($('#descritpionCompetences').val());
            $("#competence").hide(1000);
            $("#experience").show(1000);

        }
    });

    $("#bouttonCompetence .precedant button").click(function()
    {
        $('#icones_categories').val("");
        $('#mes_competences').val("");
        $('#descritpionCompetences').val("");
        $('#poste').val("");
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
        $('#experience').hide(1000);
        $('#distinction').show(1000);
    });
        
    // --------------------------- Distinction -------------------------------

    var organisateurs = [];
    var anneeDistinction = [];
    var typeDistinction = [];
    var descriptionDistinction = [];
    var rangDistinction = [];

    $('#bouttonDistinction .ajouter button').click(function()
    {
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
    });

    $('#bouttonDistinction .precedant button').click(function()
    {
        $('#organisateurs').val("");
        $('#anneeDistinction').val("");
        $('#typeDistinction').val("");
        $('#descriptionDistinction').val("");
        $('#rangDistinction').val("");
        organisateurs = [];
        anneeDistinction = [];
        typeDistinction = [];
        descriptionDistinction = [];
        rangDistinction = [];

        $('#distinction').hide(1000);
        $('#experience').show(1000);
    });

    $('#bouttonDistinction .suivant button').click(function()
    {
        organisateurs.push($('#organisateurs').val());
        anneeDistinction.push($('#anneeDistinction').val());
        typeDistinction.push($('#typeDistinction').val());
        descriptionDistinction.push($('#descriptionDistinction').val());
        rangDistinction.push($('#rangDistinction').val());

        $('#register').show(1000);
    });
    
    //-------------------------- LES DONNEES ---------------------------------

    $('#register').click(function()
    {
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
            lien_github: $('#username_github').val(),
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
            descriptionE: descriptionExperiences,
            // ------------------- Distinction ----------------------
            nomD: organisateurs,
            anneeD: anneeDistinction,
            typeD: typeDistinction,
            descriptionD: descriptionDistinction,
            rangD: rangDistinction,
            // ------------------------ Poste -----------------------
            poste: $('#poste').val()
        };

        console.log(donnees);
        $.post("../controllers/controllers.php", donnees, function(data,status)
        {
            if(status == 'success')
            {
                alert('Super ! Vous êtes parmis nous...!');
                window.location.replace('../index.php');
            }
            else
            {
                alert(data);
            }
        });
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
        // ------------------ Distinction ------------------------
        organisateurs = [];
        anneeDistinction = [];
        typeDistinction = [];
        descriptionDistinction = [];
        rangDistinction = [];

        $('document').load('../index.php');
    });
});
