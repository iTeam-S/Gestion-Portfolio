import { Distinctions } from 'src/output';
import { Repository } from 'typeorm';
import { DistinctionsCreateDto, DistinctionsUpdateDto } from './dto';
export declare class DistinctionsService {
    private distinctionsRepository;
    constructor(distinctionsRepository: Repository<Distinctions>);
    findOne(donnees: {
        id: number;
    }): Promise<Distinctions[]>;
    create(id_membre: number, donnees: DistinctionsCreateDto): Promise<void>;
    update(id_membre: number, donnees: DistinctionsUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
