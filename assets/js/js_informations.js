$(document).ready(function()
{
    $('#formations').load('show.php #formationsToShow');
    $('#fonctions').load('show.php #fonctionsToShow');
    $('#experiences').load('show.php #experiencesToShow');
    $('#distinctions').load('show.php #distinctionsToShow');
    $('#competences').load('show.php #competencesToShow');

    $('#bouttonAjouterFormations').click(function(){
        $('#formationsToShow').hide();
    });
});
