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
exports.ProjetsService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let ProjetsService = class ProjetsService {
    constructor(projetsRepository) {
        this.projetsRepository = projetsRepository;
    }
    async findOne(donnes) {
        return await this.projetsRepository
            .createQueryBuilder('p')
            .select([
            "p.nom as nom", "p.description as description", "p.lien as lien",
            "p.pdc as pdc", "p.ordre as ordre", "m.prenom_usuel as prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "p.id_membre=m.id")
            .where(`m.id=identifiant`, {
            identifiant: donnes.id
        })
            .getRawMany();
    }
    async create(id_membre, donnes) {
        await this.projetsRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Projets)
            .values({
            nom: donnes.nom,
            description: donnes.description,
            lien: donnes.lien,
            pdc: donnes.pdc,
            idMembre: id_membre,
            ordre: donnes.ordre
        })
            .execute();
    }
    async update(id_membre, donnees) {
        await this.projetsRepository
            .createQueryBuilder()
            .update(output_1.Projets)
            .set({
            nom: donnees.nom,
            description: donnees.description,
            lien: donnees.lien,
            pdc: donnees.pdc,
            ordre: donnees.ordre
        })
            .where(`id=:id AND id_membre=:identifiant`, {
            id: donnees.id,
            identifiant: id_membre
        })
            .execute();
    }
    async remove(donnees) {
        await this.projetsRepository.delete(donnees.id);
    }
};
ProjetsService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Projets)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], ProjetsService);
exports.ProjetsService = ProjetsService;
//# sourceMappingURL=projets.service.js.map