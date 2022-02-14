<?php 
class ControllerUpdate {
    
    public function membre(string $user_github, string $tel1, string $tel2,
     string $mail, string $facebook, string $linkedin, string $adresse,
     string $description, string $function, int $identifiant) {
        $infos=[
            'user_github' => strip_tags(trim($user_github)),
            'tel1' => strip_tags(trim($tel1)),
            'tel2' => strip_tags(trim($tel2)),
            'mail' => strip_tags(trim($mail)),
            'facebook' => strip_tags(trim($facebook)),
            'linkedin' => strip_tags(trim($linkedin)),
            'adresse' => strip_tags(trim($adresse)),
            'description' => strip_tags(trim($description)),
            'fonction' => strip_tags(trim($fonction)),
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $update=new Membre();
        $update->updateMembre($infos);
        unset($update);
        echo '1';
    }

}
