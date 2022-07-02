import { CompetencesService } from './competences.service';
import { CompetencesCreateDto, CompetencesUpdateDto } from './dto';
export declare class CompetencesController {
    private readonly competencesService;
    constructor(competencesService: CompetencesService);
    getCompetences(req: any): Promise<import("../output").Competences[]>;
    createCompetences(donnees: CompetencesCreateDto, req: any): Promise<void>;
    updateCompetences(donnees: CompetencesUpdateDto, req: any): Promise<void>;
    removeCompetences(donnees: {
        id: number;
    }): Promise<void>;
}
