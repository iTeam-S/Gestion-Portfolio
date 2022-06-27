import { Injectable, UnauthorizedException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Membre } from 'src/output';
import { Repository } from 'typeorm';
import { UpdateInfoDto, UpdatePasswordDto } from './dto';

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

    async updateInfo(id: number, donnees: UpdateInfoDto): Promise<void> {
        await this.membreRepository
            .createQueryBuilder()
            .update(Membre)
            .set({
                userGithub: donnees.user_github,
                userGithubPic: donnees.user_github_pic,
                tel1: donnees.tel1,
                tel2: donnees.tel2,
                mail: donnees.mail,
                facebook: donnees.facebook,
                linkedin: donnees.linkedin,
                cv: donnees.cv,
                adresse: donnees.adresse,
                description: donnees.description,
                fonction: donnees.fonction,
                pdc: donnees.pdc,
                dark: donnees.dark,
                role: donnees.role
            })
            .where("id=:identifiant", { identifiant: id })
            .execute();
    }

    private async verifyPassword(id: number, donnees: UpdatePasswordDto): Promise<Membre> {
        return await this.membreRepository
            .createQueryBuilder("m")
            .select(["m.id"])
            .where(
                `m.id=:identifiant 
                AND m.password=SHA2(:key, 256)`, 
                { 
                    identifiant: id,
                    key: donnees.lastPassword
                })
            .getRawOne();
    }

    async updatePassword(id: number, donnees: UpdatePasswordDto): Promise<void> {
        const verify = await this.verifyPassword(id, donnees);
        if(!verify) throw new UnauthorizedException("Credentials incorrects !");
        await this.membreRepository
            .createQueryBuilder()
            .update(Membre)
            .set({
                password: donnees.newPassword
            })
            .where("id=:identifiant", { identifiant: id })
            .execute();
    }
}
