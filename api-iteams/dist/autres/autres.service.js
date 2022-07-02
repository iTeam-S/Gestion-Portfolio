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
exports.AutresService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let AutresService = class AutresService {
    constructor(autresRepository) {
        this.autresRepository = autresRepository;
    }
    async findOne(donnees) {
        return await this.autresRepository
            .createQueryBuilder('a')
            .select([
            "a.nom as nom", "a.lien as lien",
            "m.prenom_usuel as prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "a.id_membre=m.id")
            .where(`m.id=:identifiant`, { identifiant: donnees.id })
            .getRawMany();
    }
    async create(id_membre, donnees) {
        await this.autresRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Autres)
            .values({
            nom: donnees.nom,
            lien: donnees.lien,
            idMembre: id_membre
        })
            .execute();
    }
    async update(id_membre, donnees) {
        await this.autresRepository
            .createQueryBuilder()
            .update(output_1.Autres)
            .set({
            nom: donnees.nom,
            lien: donnees.lien
        })
            .where(`id=:id AND id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
            .execute();
    }
    async remove(donnees) {
        await this.autresRepository.delete(donnees.id);
    }
};
AutresService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Autres)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], AutresService);
exports.AutresService = AutresService;
//# sourceMappingURL=autres.service.js.map