import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Membre } from 'src/output';
import { Repository } from 'typeorm';

@Injectable()
export class MembreService {
    constructor(
        @InjectRepository(Membre)
        private membreRepository: Repository<Membre>
    ) {}

    async findOne(donnees: { id: number }): Promise<Membre> {
        return await this.membreRepository
            .createQueryBuilder("m")
            .select([
                "m.id AS id", "m.nom AS nom", "m.prenom AS prenom", 
                "m.prenom_usuel AS prenom_usuel", "m.user_github AS user_github", 
                "m.user_github_pic AS user_github_pic", "m.tel1 AS tel1", 
                "m.tel2 AS tel2", "m.mail AS mail", "m.date_d_adhesion AS date_d_adhesion", 
                "m.facebook AS facebook", "m.linkedin AS linkedin", "m.actif AS actif", 
                "m.cv AS cv", "m.adresse AS adresse", "m.description AS description",
                "m.fonction AS fonction", "m.pdc AS pdc", "m.dark AS dark", 
                "m.point_experience AS point_experience", "m.role AS role"
            ])
            .where("m.id=:id", { id: donnees.id })
            .getRawOne();
    }
}
