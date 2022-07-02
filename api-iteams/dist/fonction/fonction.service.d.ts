import { Fonction } from 'src/output';
import { Repository } from 'typeorm';
import { FonctionCreateDto, FonctionUpdateDto } from './dto';
export declare class FonctionService {
    private fonctionRepository;
    constructor(fonctionRepository: Repository<Fonction>);
    findOne(donnees: {
        id: number;
    }): Promise<Fonction>;
    create(id_membre: number, donnees: FonctionCreateDto): Promise<void>;
    update(id_membre: number, donnees: FonctionUpdateDto): Promise<void>;
}
