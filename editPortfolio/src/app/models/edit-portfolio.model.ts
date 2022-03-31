export class Membre {
    id!:number;
    nom!: string;
    prenom!: string;
    prenom_usuel!: string;
    user_github?: string;
    user_github_pic?: string;
    tel1!: string;
    tel2?: string;
    mail!: string;
    date_d_adhesion?: string;
    facebook?: string;
    linkedin?: string;
    cv?: string;
    adresse?: string;
    description?: string;
    fonction?: string;
    pdc?: string;
    dark?: number;
}

export class MembreUpdate {
    user_github!: string;
    tel1!: string;
    tel2!: string;
    mail!: string;
    facebook!: string;
    linkedin!: string;
    cv!:string;
    adresse!: string;
    description!: string;
    fonction!: string;
    pdc!: string;
    dark!:string;
}

export class PasswordUpdate {
    lastPassword!: string;
    newPassword!: string;
    confirmPassword!: string;
}

export class Fonction {
    id!: number;
    date!: string;
    id_membre!: number;
    prenom_usuel!: string;
    id_poste!:number;
    nom!: string;
    categorie!: string;
}

export class FonctionUpdate {
    id_poste!: string;
    id!: string;
}

export class Formations {
    id!:number;
    lieu!: string;
    annee!: string;
    type!: string;
    description!: string;
    id_membre!: string;
    ordre!: number;
    prenom_usuel!: string;
}

export class FormationsUpdate {
    id!: string;
    lieu!: string;
    annee!: string;
    type!: string;
    description!: string;
}

export class FormationsAdd {
    lieu!: string;
    annee!: string;
    type!: string;
    description!: string;
}

export class Experiences {
    id!: number;
    nom!: string;
    annee!: string;
    type!: string;
    description!: string;
    id_membre!: number;
    ordre!: number;
    prenom_usuel!: string;
}

export class ExperiencesUpdate {
    nom!: string;
    annee!: string;
    type!: string;
    description!: string;
    id!: string;
}

export class ExperiencesAdd {
    nom!: string;
    annee!: string;
    type!: string;
    description!: string;
}

export class Competences {
    id!: number;
    nom!: string;
    liste!: string;
    id_categorie!: number;
    categorie!: string;
    icone!: string;
    id_membre!: number;
    ordre!: number;
    prenom_usuel!: string;
}

export class CompetencesAdd {
    nom!: string;
    liste!: string;
    id_categorie!: string;
}

export class CompetencesUpdate {
    nom!: string;
    liste!: string;
    id_categorie!: string;
    id!: string;
}

export class Distinctions {
    id!: number;
    organisateur!: string;
    annee!: string;
    type!: string;
    description!: string;
    id_membre!: number;
    ordre!: number;
    prenom_usuel!: string;
}

export class DistinctionsUpdate {
    id!: string;
    organisateur!: string;
    annee!: string;
    type!: string;
    description!: string;
    ordre!: string;
}

export class DistinctionsAdd {
    organisateur!: string;
    annee!: string;
    type!: string;
    description!: string;
    ordre!: string;
}

export class Projets {
    id!: number;
    nom!: string;
    description!: string;
    lien!: string;
    pdc!: string;
    id_membre!: number;
    ordre!: number;
    prenom_usuel!: string;
}

export class ProjetsUpdate {
    nom!: string;
    description!: string;
    lien!: string;
    pdc!: string;
    ordre!: string;
    id!: string;
}

export class ProjetsAdd {
    nom!: string;
    description!: string;
    lien!: string;
    pdc!: string;
    ordre!: string;
}
