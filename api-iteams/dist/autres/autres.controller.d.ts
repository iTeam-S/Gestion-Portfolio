import { AutresService } from './autres.service';
import { AutresCreateDto, AutresUpdateDto } from './dto';
export declare class AutresController {
    private readonly autresService;
    constructor(autresService: AutresService);
    getAutres(req: any): Promise<import("../output").Autres[]>;
    createAutres(donnees: AutresCreateDto, req: any): Promise<void>;
    updateAutres(donnees: AutresUpdateDto, req: any): Promise<void>;
    removeAutres(donnees: {
        id: number;
    }): Promise<void>;
}
