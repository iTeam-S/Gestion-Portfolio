import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Fonction, Membre, Poste } from 'src/output';
import { Repository } from 'typeorm';

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
}
