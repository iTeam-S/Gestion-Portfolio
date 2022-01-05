$(document).ready(function(){
    $('#inscription').click(function(){
        window.location.href = 'views/inscription.php';
    });

        // ******************* for hiding or showing the password ********************
    $('#show_password').click(function(){
        if($('#password').prop('type') === 'password'){
            $('#password').prop('type', 'text');
            $('#image_key').attr('src', 'assets/images/show.png');
        }
        else{
            $('#password').prop('type', 'password');
            $('#image_key').attr('src', 'assets/images/hide.webp');
        }
    });

    $('#connecter').click(function(){
        if($('#identifiant').val().trim().length !== 0 && $('#password').val().trim().length !== 0){
            let donnees = {
                identifiant: $('#identifiant').val(),
                password: $('#password').val()
            };
            $.post('/controllers/index.php?demande=login', donnees, function(data)
            {
                if(data == '1'){
                    window.location.href = 'views/informations.php';
                }
                else{
                    alert(data);
                }
            });
        }
        else{
            alert("Veuillez entrer votre identifiant et votre mot de passe...!\n\t\t\tMerci...!");
        }
    });
});
