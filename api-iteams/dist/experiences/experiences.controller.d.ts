import { ExperiencesCreateDto, ExperiencesUpdateDto } from './dto';
import { ExperiencesService } from './experiences.service';
export declare class ExperiencesController {
    private readonly experiencesService;
    constructor(experiencesService: ExperiencesService);
    getExperiences(req: any): Promise<import("../output").Experiences[]>;
    createExperiences(donnees: ExperiencesCreateDto, req: any): Promise<void>;
    updateExperiences(donnees: ExperiencesUpdateDto, req: any): Promise<void>;
    removeExperiences(donnees: {
        id: number;
    }): Promise<void>;
}
