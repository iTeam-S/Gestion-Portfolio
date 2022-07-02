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
exports.ExperiencesService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let ExperiencesService = class ExperiencesService {
    constructor(experiencesRepository) {
        this.experiencesRepository = experiencesRepository;
    }
    async findOne(donnees) {
        return await this.experiencesRepository
            .createQueryBuilder("e")
            .select([
            "e.id AS id", "e.nom AS nom", "e.annee AS annee",
            "e.type AS type", "e.description AS description",
            "e.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "e.id_membre=m.id")
            .where(`m.id=:identifiant`, { identifiant: donnees.id })
            .orderBy("e.id", "DESC")
            .getRawMany();
    }
    async create(id_membre, donnees) {
        await this.experiencesRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Experiences)
            .values({
            nom: donnees.nom,
            annee: donnees.annee,
            type: donnees.type,
            idMembre: id_membre,
            ordre: 0
        })
            .execute();
    }
    async update(id_membre, donnees) {
        await this.experiencesRepository
            .createQueryBuilder()
            .update(output_1.Experiences)
            .set({
            nom: donnees.nom,
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
    async remove(donnees) {
        await this.experiencesRepository.delete(donnees.id);
    }
};
ExperiencesService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Experiences)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], ExperiencesService);
exports.ExperiencesService = ExperiencesService;
//# sourceMappingURL=experiences.service.js.map