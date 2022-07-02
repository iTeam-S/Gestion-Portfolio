import { Projets } from 'src/output';
import { Repository } from 'typeorm';
import { ProjetsCreateDto, ProjetsUpdateDto } from './dto';
export declare class ProjetsService {
    private readonly projetsRepository;
    constructor(projetsRepository: Repository<Projets>);
    findOne(donnes: {
        id: number;
    }): Promise<Projets[]>;
    create(id_membre: number, donnes: ProjetsCreateDto): Promise<void>;
    update(id_membre: number, donnees: ProjetsUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
