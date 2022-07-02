import { Membre } from 'src/output';
import { Repository } from 'typeorm';
import { UpdateInfoDto, UpdatePasswordDto } from './dto';
export declare class MembreService {
    private membreRepository;
    constructor(membreRepository: Repository<Membre>);
    findOne(donnees: {
        id: number;
    }): Promise<Membre>;
    updateInfo(id: number, donnees: UpdateInfoDto): Promise<void>;
    private verifyPassword;
    updatePassword(id: number, donnees: UpdatePasswordDto): Promise<void>;
}
