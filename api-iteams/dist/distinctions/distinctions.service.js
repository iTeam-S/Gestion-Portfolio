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
exports.DistinctionsService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let DistinctionsService = class DistinctionsService {
    constructor(distinctionsRepository) {
        this.distinctionsRepository = distinctionsRepository;
    }
    async findOne(donnees) {
        return await this.distinctionsRepository
            .createQueryBuilder("d")
            .select([
            "d.id AS id", "d.organisateur AS organisateur",
            "d.annee AS annee", "d.type AS type", "d.description AS description",
            "d.ordre AS ordre", "m.prenom_usuel AS prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "d.id_membre=m.id")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .getRawMany();
    }
    async create(id_membre, donnees) {
        await this.distinctionsRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Distinctions)
            .values({
            organisateur: donnees.organisateur,
            annee: donnees.annee,
            type: donnees.type,
            description: donnees.description,
            idMembre: id_membre,
            ordre: donnees.ordre
        })
            .execute();
    }
    async update(id_membre, donnees) {
        await this.distinctionsRepository
            .createQueryBuilder()
            .update(output_1.Distinctions)
            .set({
            organisateur: donnees.organisateur,
            annee: donnees.annee,
            type: donnees.type,
            description: donnees.description,
            ordre: donnees.ordre
        })
            .where(`id=:id AND id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
            .execute();
    }
    async remove(donnees) {
        await this.distinctionsRepository.delete(donnees.id);
    }
};
DistinctionsService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Distinctions)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], DistinctionsService);
exports.DistinctionsService = DistinctionsService;
//# sourceMappingURL=distinctions.service.js.map