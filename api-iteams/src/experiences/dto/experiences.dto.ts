export class ExperiencesCreateDto {
    nom: string;
    annee: string;
    type: string;
    description: string;
    id_membre?: number;
}

export class ExperiencesUpdateDto {
    id: number;
    nom: string;
    annee: string;
    type: string;
    description: string;
    id_membre?: number
}
