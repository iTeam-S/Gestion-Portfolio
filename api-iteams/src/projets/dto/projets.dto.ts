export class ProjetsCreateDto {
    nom: string;
    description: string;
    lien: string;
    pdc: string;
    ordre: number;
}

export class ProjetsUpdateDto {
    id: number;
    nom: string;
    description: string;
    lien: string;
    pdc: string;
    ordre: number;
}
