export class CompetencesCreateDto {
    nom: string;
    liste: string;
    id_categorie: number;
}

export class CompetencesUpdateDto {
    id: number;
    nom: string;
    liste: string;
    id_categorie: number;
}
