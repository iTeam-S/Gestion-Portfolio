import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Formations, Membre } from 'src/output';
import { Repository } from 'typeorm';
import { FormationsCreateDto, FormationsUpdateDto } from './dto';

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
            .orderBy("f.id", "DESC")
            .getRawMany();
    }

    async create(id_membre: number, donnees: FormationsCreateDto): Promise<void> {
        await this.formationsRepository
            .createQueryBuilder()
            .insert()
            .into(Formations)
            .values({
                lieu: donnees.lieu,
                annee: donnees.annee,
                type: donnees.type,
                description: donnees.description,
                idMembre: id_membre,
                ordre: 0
            })
            .execute();
    }

    async update(id_membre: number, donnees: FormationsUpdateDto): Promise<void> {
        await this.formationsRepository
            .createQueryBuilder()
            .update(Formations)
            .set({
                lieu: donnees.lieu,
                annee: donnees.annee,
                type: donnees.type,
                description: donnees.description
            })
            .where(`id=:id AND id_membre=:identifiant`, {
                id: donnees.id,
                identifiant: id_membre
            })
            .execute();
    }

    async remove(donnees: { id: number }): Promise<void> {
        await this.formationsRepository.delete(donnees.id);
    }
}
