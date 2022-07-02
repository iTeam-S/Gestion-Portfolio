export class FormationsCreateDto {
    lieu: string;
    annee: string;
    type: string;
    description: string;
}

export class FormationsUpdateDto {
    id: number;
    lieu: string;
    annee: string;
    type: string;
    description: string;
}
