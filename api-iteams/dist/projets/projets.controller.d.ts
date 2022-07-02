import { ProjetsCreateDto, ProjetsUpdateDto } from './dto';
import { ProjetsService } from './projets.service';
export declare class ProjetsController {
    private readonly projetsService;
    constructor(projetsService: ProjetsService);
    getProjets(req: any): Promise<import("../output").Projets[]>;
    createProjets(donnees: ProjetsCreateDto, req: any): Promise<void>;
    updateProjets(donnees: ProjetsUpdateDto, req: any): Promise<void>;
    removeProjets(donnees: {
        id: number;
    }): Promise<void>;
}
