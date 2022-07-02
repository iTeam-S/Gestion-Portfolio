import { FormationsCreateDto, FormationsUpdateDto } from './dto';
import { FormationsService } from './formations.service';
export declare class FormationsController {
    private readonly formationsService;
    constructor(formationsService: FormationsService);
    getFormations(req: any): Promise<import("../output").Formations[]>;
    createFormations(donnees: FormationsCreateDto, req: any): Promise<void>;
    updateFormations(donnees: FormationsUpdateDto, req: any): Promise<void>;
    deleteFormations(donnees: {
        id: number;
    }): Promise<void>;
}
