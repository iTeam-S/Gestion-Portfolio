import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Formations, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { FormationsCreateDto } from './dto/formations.dto';

@Injectable()
export class FormationsService {
    constructor(
        @InjectRepository(Formations)
        private formationsRepository: Repository<Formations>
    ) {}

    async findOne(donnees: { id: number }): Promise<Formations[]> {
        return await this.formationsRepository
            .createQueryBuilder("f")
            .select([
                "f.id AS id", "f.lieu AS lieu", "f.annee AS annee", 
                "f.type AS type", "f.description AS description", 
                "f.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
            ])
            .innerJoin(Membre, "m", "f.id_membre=m.id")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .getRawMany();
    }

    async create(donnees: FormationsCreateDto): Promise<void> {
        await this.formationsRepository
            .createQueryBuilder()
            .insert()
            .into(Formations)
            .values({
                lieu: donnees.lieu,
                annee: donnees.annee,
                type: donnees.type,
                description: donnees.description,
                ordre: donnees.ordre,
                idMembre: donnees.id_membre
            })
            .execute();
    }
}
