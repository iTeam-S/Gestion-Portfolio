import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { CategorieCompetence, Competences, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { CompetencesCreateDto, CompetencesUpdateDto } from './dto';

@Injectable()
export class CompetencesService {
    constructor(
        @InjectRepository(Competences)
        private competencesRepository: Repository<Competences>
    ) {}

    async findOne(donnees:{ id: number }): Promise<Competences[]> {
        return await this.competencesRepository
        .createQueryBuilder('c')
        .select([
            "c.nom as nom", "c.liste as liste", "ct.categorie as categorie", 
            "ct.icone as icone", "m.prenom_usuel as prenom_usuel"
        ])
        .innerJoin(CategorieCompetence, "ct", "ct.id=c.id_categorie")
        .innerJoin(Membre, "m", "c.id_membre=m.id")
        .where(`m.id=:identifiant`, { identifiant: donnees.id })
        .getRawMany();
    }

    async create(id_membre: number, 
        donnees: CompetencesCreateDto): Promise<void> {
        await this.competencesRepository
        .createQueryBuilder()
        .insert()
        .into(Competences)
        .values({
            nom: donnees.nom,
            liste: donnees.liste,
            idCategorie: donnees.id_categorie,
            idMembre: id_membre,
            ordre: 0
        })
        .execute();
    }

    async update(id_membre: number, 
        donnees: CompetencesUpdateDto): Promise<void> {
        await this.competencesRepository
        .createQueryBuilder()
        .update(Competences)
        .set({
            nom: donnees.nom,
            liste: donnees.liste,
            idCategorie: donnees.id_categorie
        })
        .where(`id=:id AND id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
        .execute();
    }

    async remove(donnees: { id: number }): Promise<void> {
        await this.competencesRepository.delete(donnees.id);
    }
}
