import { JwtService } from '@nestjs/jwt';
import { Repository } from 'typeorm';
import { Membre } from 'src/output';
import { authMembreDto, ResponseTokenDto } from './dto';
export declare class AuthService {
    private authRepository;
    private jwtService;
    constructor(authRepository: Repository<Membre>, jwtService: JwtService);
    private signMembre;
    authMembre(donnees: authMembreDto): Promise<ResponseTokenDto>;
}
