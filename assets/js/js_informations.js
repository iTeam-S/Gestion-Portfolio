$(document).ready(function()
{
    $.get('../../controllers/informations.php', function(data, status)
    {
        if(status == 'success')
        {
            $.post('../../views/informations.php', data);
        }
    });
});
