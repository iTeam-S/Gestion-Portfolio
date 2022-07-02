"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.MembreService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let MembreService = class MembreService {
    constructor(membreRepository) {
        this.membreRepository = membreRepository;
    }
    async findOne(donnees) {
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
    async updateInfo(id, donnees) {
        await this.membreRepository
            .createQueryBuilder()
            .update(output_1.Membre)
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
    async verifyPassword(id, donnees) {
        return await this.membreRepository
            .createQueryBuilder("m")
            .select(["m.id"])
            .where(`m.id=:identifiant 
                AND m.password=SHA2(:key, 256)`, {
            identifiant: id,
            key: donnees.lastPassword
        })
            .getRawOne();
    }
    async updatePassword(id, donnees) {
        const verify = await this.verifyPassword(id, donnees);
        if (!verify)
            throw new common_1.UnauthorizedException("Credentials incorrects !");
        await this.membreRepository
            .createQueryBuilder()
            .update(output_1.Membre)
            .set({
            password: () => "SHA2('" + donnees.newPassword + "', 256)"
        })
            .where("id=:identifiant", { identifiant: id })
            .execute();
    }
};
MembreService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Membre)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], MembreService);
exports.MembreService = MembreService;
//# sourceMappingURL=membre.service.js.map