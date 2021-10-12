$(document).ready(function()
{
    $("#formation").hide();
    $("#experience").hide();
    $("#competence").hide();


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
            $("#infosF2").hide();
        // }
    });


    //-----------------------------------------------------
    $("#bouttonFormation .suivant button").click(function()
    {
        $("#formation").hide(1000);
        $("#competence").show(1000);
    });

    $("#bouttonFormation .precedant button").click(function()
    {
        $("#formation").hide(1000);
        $("#membre").show(1000);
    });

    $("#bouttonFormation .ajouter button").click(function()
    {
        $("#infosF2").show(1000);
    });


    // ----------------------------------------------
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
            $("#competence").hide(1000);
            $("#experience").show(1000);
            $("#infosE2").hide();
        // }
    });

    $("#bouttonCompetence .precedant button").click(function()
    {
        $("#competence").hide(1000);
        $("#formation").show(1000);
    });


    //----------------------------------------------------
    $("#bouttonExperience .precedant button").click(function()
        {
            $("#experience").hide(1000);
            $("#competence").show(1000);
        });

    $("#bouttonExperience .ajouter button").click(function()
    {
        $("#infosE2").show(1000);
    });
});
