import { Autres } from 'src/output';
import { Repository } from 'typeorm';
import { AutresCreateDto, AutresUpdateDto } from './dto';
export declare class AutresService {
    private autresRepository;
    constructor(autresRepository: Repository<Autres>);
    findOne(donnees: {
        id: number;
    }): Promise<Autres[]>;
    create(id_membre: number, donnees: AutresCreateDto): Promise<void>;
    update(id_membre: number, donnees: AutresUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
