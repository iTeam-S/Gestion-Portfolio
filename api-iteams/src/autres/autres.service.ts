import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Autres, Membre } from 'src/output';
import { Repository } from 'typeorm';

@Injectable()
export class AutresService {
    constructor(
        @InjectRepository(Autres)
        private autresRepository: Repository<Autres>
    ) {}

    async findOne(donnees: {id: number}): Promise<Autres[]> {
        return await this.autresRepository
        .createQueryBuilder('a')
        .select([
            "a.nom as nom", "a.lien as lien", 
            "m.prenom_usuel as prenom_usuel"
        ])
        .innerJoin(Membre, "m", "a.id_membre=m.id")
        .where(`m.id=:identifiant`, { identifiant: donnees.id })
        .getRawMany();
    }
}
