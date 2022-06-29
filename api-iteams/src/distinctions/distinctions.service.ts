import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Distinctions, Membre } from 'src/output';
import { Repository } from 'typeorm';

@Injectable()
export class DistinctionsService {
    constructor(
        @InjectRepository(Distinctions)
        private distinctionsRepository: Repository<Distinctions>
    ) {}

    async findOne(donnees: { id: number }): Promise<Distinctions[]> {
        return await this.distinctionsRepository
            .createQueryBuilder("d")
            .select([
                "d.id AS id", "d.organisateur AS organisateur", 
                "d.annee AS annee", "d.type AS type", "d.description AS description", 
                "d.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
            ])
            .innerJoin(Membre, "m", "d.id_membre=m.id")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .getRawMany();
    }
}
