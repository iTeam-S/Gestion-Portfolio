import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Fonction, Membre, Poste } from 'src/output';
import { Repository } from 'typeorm';
import { FonctionCreateDto } from './dto';

@Injectable()
export class FonctionService {
    constructor(
        @InjectRepository(Fonction)
        private fonctionRepository: Repository<Fonction>
    ) {}

    async findOne(donnees: { id: number }): Promise<Fonction> {
        return await this.fonctionRepository
            .createQueryBuilder("f")
            .select([
                "f.id", "f.date_debut_fonction", "p.nom", "p.categorie",
                "m.prenom_usuel"
            ])
            .innerJoin(Membre, "m", "f.id_membre=m.id")
            .innerJoin(Poste, "p", "p.id=f.id_poste")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .getRawOne();
    }

    async create(donnees: FonctionCreateDto): Promise<void> {
        await this.fonctionRepository
            .createQueryBuilder()
            .insert()
            .into(Fonction)
            .values({
                idMembre: donnees.id_membre,
                idPoste: donnees.id_poste
            })
            .execute();
    }
}
