import { Membre } from "./Membre";
export declare class Formations {
    id: number;
    lieu: string | null;
    annee: string | null;
    type: string | null;
    description: string | null;
    idMembre: number;
    ordre: number;
    idMembre2: Membre;
}
