import { FonctionUpdateDto } from './dto';
import { FonctionService } from './fonction.service';
export declare class FonctionController {
    private readonly fonctionService;
    constructor(fonctionService: FonctionService);
    getFonction(req: any): Promise<import("../output").Fonction>;
    createFonction(donnees: {
        id_poste: number;
    }, req: any): Promise<void>;
    updateFonction(donnees: FonctionUpdateDto, req: any): Promise<void>;
}
