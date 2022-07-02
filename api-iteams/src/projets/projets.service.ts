import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Membre, Projets } from 'src/output';
import { Repository } from 'typeorm';
import { ProjetsCreateDto, ProjetsUpdateDto } from './dto';

@Injectable()
export class ProjetsService {
    constructor(
        @InjectRepository(Projets)
        private readonly projetsRepository: Repository<Projets>
    ) {}

    async findOne(donnes: {id: number}): Promise<Projets[]> {
        return await this.projetsRepository
        .createQueryBuilder('p')
        .select([
            "p.nom as nom", "p.description as description", "p.lien as lien", 
            "p.pdc as pdc", "p.ordre as ordre", "m.prenom_usuel as prenom_usuel"
        ])
        .innerJoin(Membre, "m", "p.id_membre=m.id")
        .where(`m.id=identifiant`, {
            identifiant: donnes.id
        })
        .getRawMany();
    }

    async create(id_membre: number, 
        donnes: ProjetsCreateDto): Promise<void> {
        await this.projetsRepository
        .createQueryBuilder()
        .insert()
        .into(Projets)
        .values({
            nom: donnes.nom,
            description: donnes.description,
            lien: donnes.lien,
            pdc: donnes.pdc,
            idMembre: id_membre,
            ordre: donnes.ordre
        })
        .execute();
    }

    async update(id_membre: number, 
        donnees: ProjetsUpdateDto): Promise<void> {
        await this.projetsRepository
        .createQueryBuilder('p')
        .update(Projets)
        .set({
            nom: donnees.nom,
            description: donnees.description,
            lien: donnees.lien,
            pdc: donnees.pdc,
            ordre: donnees.ordre
        })
        .where(`p.id=:id AND p.id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
        .execute();
    }
}
