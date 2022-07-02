import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Experiences, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { ExperiencesCreateDto, ExperiencesUpdateDto } from './dto/experiences.dto';

@Injectable()
export class ExperiencesService {
    constructor(
        @InjectRepository(Experiences)
        private experiencesRepository: Repository<Experiences>
    ) {}

    async findOne(donnees: { id: number }): Promise<Experiences[]> {
        return await this.experiencesRepository
            .createQueryBuilder("e")
            .select([
                "e.id AS id", "e.nom AS nom", "e.annee AS annee", 
                "e.type AS type", "e.description AS description", 
                "e.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
            ])
            .innerJoin(Membre, "m", "e.id_membre=m.id")
            .where(`m.id=:identifiant`, { identifiant: donnees.id })
            .getRawMany()
    }

    async create(id_membre: number, donnees: ExperiencesCreateDto): Promise<void> {
        await this.experiencesRepository
            .createQueryBuilder()
            .insert()
            .into(Experiences)
            .values({
                nom: donnees.nom,
                annee: donnees.annee,
                type: donnees.type,
                idMembre: id_membre,
                ordre: 0
            })
            .execute();
    }

    async update(id_membre: number, donnees: ExperiencesUpdateDto): Promise<void> {
        await this.experiencesRepository
            .createQueryBuilder("e")
            .update(Experiences)
            .set({
                nom: donnees.nom,
                annee: donnees.annee,
                type: donnees.type,
                description: donnees.description
            })
            .where(`e.id=:id AND e.id_membre=:identifiant`, {
                id: donnees.id,
                identifiant: id_membre
            })
            .execute();
    }
}
