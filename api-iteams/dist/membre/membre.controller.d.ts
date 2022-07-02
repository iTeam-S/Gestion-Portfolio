import { UpdateInfoDto, UpdatePasswordDto } from './dto';
import { MembreService } from './membre.service';
export declare class MembreController {
    private readonly membreService;
    constructor(membreService: MembreService);
    getMembre(req: any): Promise<import("../output").Membre>;
    updateInfoMembre(donnees: UpdateInfoDto, req: any): Promise<void>;
    updatePasswordMembre(donnees: UpdatePasswordDto, req: any): Promise<void>;
}
