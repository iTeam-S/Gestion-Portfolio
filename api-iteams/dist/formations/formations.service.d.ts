import { Formations } from 'src/output';
import { Repository } from 'typeorm';
import { FormationsCreateDto, FormationsUpdateDto } from './dto';
export declare class FormationsService {
    private formationsRepository;
    constructor(formationsRepository: Repository<Formations>);
    findOne(donnees: {
        id: number;
    }): Promise<Formations[]>;
    create(id_membre: number, donnees: FormationsCreateDto): Promise<void>;
    update(id_membre: number, donnees: FormationsUpdateDto): Promise<void>;
    remove(donnees: {
        id: number;
    }): Promise<void>;
}
