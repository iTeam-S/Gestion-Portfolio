import { Experiences } from 'src/output';
import { Repository } from 'typeorm';
import { ExperiencesCreateDto, ExperiencesUpdateDto } from './dto';
export declare class ExperiencesService {
    private experiencesRepository;
    constructor(experiencesRepository: Repository<Experiences>);
    findOne(donnees: {
        id: number;
    }): Promise<Experiences[]>;
    create(id_membre: number, donnees: ExperiencesCreateDto): Promise<void>;
    update(id_membre: number, donnees: ExperiencesUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
