import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Distinctions, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { DistinctionsCreateDto, DistinctionsUpdateDto } from './dto';

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

    async create(id_membre: number, 
        donnees: DistinctionsCreateDto): Promise<void> {
        await this.distinctionsRepository
        .createQueryBuilder()
        .insert()
        .into(Distinctions)
        .values({
            organisateur: donnees.organisateur,
            annee: donnees.annee,
            type: donnees.type,
            description: donnees.description,
            idMembre: id_membre,
            ordre: donnees.ordre
        })
        .execute();
    }

    async update(id_membre: number, 
        donnees: DistinctionsUpdateDto): Promise<void> {
        await this.distinctionsRepository
        .createQueryBuilder('d')
        .update(Distinctions)
        .set({
            organisateur: donnees.organisateur,
            annee: donnees.annee,
            type: donnees.type,
            description: donnees.description,
            ordre: donnees.ordre
        })
        .where(`d.id=:id AND d.id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
        .execute();
    }

    async remove(donnees: { id: number }): Promise<void> {
        await this.distinctionsRepository.delete(donnees.id);
    }
}
