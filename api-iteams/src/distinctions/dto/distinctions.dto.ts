export class DistinctionsCreateDto {
    organisateur: string;
    annee: string;
    type: string;
    description: string;
    ordre: number;
}

export class DistinctionsUpdateDto {
    id: number;
    organisateur: string;
    annee: string;
    type: string;
    description: string;
    ordre: number;
}
