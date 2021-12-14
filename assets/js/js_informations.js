var informations = [];
$(document).ready(function()
{
    $.get('../controllers/informations.php', function(donnees, status)
    {
        if(status == 'success')
        {
            informations = donnees;
            console.log(informations);
        }
    });
});
