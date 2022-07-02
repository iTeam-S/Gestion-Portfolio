import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { CategorieCompetence, Competences, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { CompetencesCreateDto } from './dto';

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
}
