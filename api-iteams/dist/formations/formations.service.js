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
exports.FormationsService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let FormationsService = class FormationsService {
    constructor(formationsRepository) {
        this.formationsRepository = formationsRepository;
    }
    async findOne(donnees) {
        return await this.formationsRepository
            .createQueryBuilder("f")
            .select([
            "f.id AS id", "f.lieu AS lieu", "f.annee AS annee",
            "f.type AS type", "f.description AS description",
            "f.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "f.id_membre=m.id")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .orderBy("f.id", "DESC")
            .getRawMany();
    }
    async create(id_membre, donnees) {
        await this.formationsRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Formations)
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
    async update(id_membre, donnees) {
        await this.formationsRepository
            .createQueryBuilder()
            .update(output_1.Formations)
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
    async remove(donnees) {
        await this.formationsRepository.delete(donnees.id);
    }
};
FormationsService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Formations)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], FormationsService);
exports.FormationsService = FormationsService;
//# sourceMappingURL=formations.service.js.map