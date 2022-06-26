import { Injectable, UnauthorizedException } from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';

import { Membre } from 'src/output';
import { authMembreDto, authResponseDto, ResponseTokenDto } from './dto';

@Injectable()
export class AuthService {
    constructor(
        @InjectRepository(Membre)
        private authRepository: Repository<Membre>,
        private jwtService: JwtService
    ) {}

    private async signMembre(donnees: authResponseDto) {
        return await this.jwtService.signAsync({
            id: donnees.id,
            prenom: donnees.prenom_usuel,
            mail: donnees.mail
        });
    }

    async authMembre(donnees: authMembreDto): Promise<ResponseTokenDto> {
        const reponse = await this.authRepository
            .createQueryBuilder("m")
            .select([
                "m.id AS id", "m.prenom_usuel AS prenom_usuel", 
                "m.mail AS mail",
            ])
            .where(`(m.prenom_usuel=:identifiant 
                OR m.mail=:identifiant) 
                AND m.password=SHA2(:key, 256)`,
                { 
                    identifiant: donnees.identifiant,
                    key: donnees.password
                })
            .getRawOne();
        if(!reponse) throw new UnauthorizedException("Credentials incorrects !");
        return {
            access_token: await this.signMembre(reponse)
        };
    }
}
