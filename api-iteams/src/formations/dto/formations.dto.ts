export class FormationsCreateDto {
    lieu: string;
    annee: string;
    type: string;
    description: string;
    ordre: number;
    id_membre?: number;
}

export class FormationsUpdateDto {
    id: number;
    lieu: string;
    annee: string;
    type: string;
    description: string;
    ordre: number;
    id_membre?: number;
}
