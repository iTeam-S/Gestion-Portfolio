export class ExperiencesCreateDto {
    nom: string;
    annee: string;
    type: string;
    description: string;
}

export class ExperiencesUpdateDto {
    id: number;
    nom: string;
    annee: string;
    type: string;
    description: string;
}
