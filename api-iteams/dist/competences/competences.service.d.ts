import { Competences } from 'src/output';
import { Repository } from 'typeorm';
import { CompetencesCreateDto, CompetencesUpdateDto } from './dto';
export declare class CompetencesService {
    private competencesRepository;
    constructor(competencesRepository: Repository<Competences>);
    findOne(donnees: {
        id: number;
    }): Promise<Competences[]>;
    create(id_membre: number, donnees: CompetencesCreateDto): Promise<void>;
    update(id_membre: number, donnees: CompetencesUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
