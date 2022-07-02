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
exports.FonctionService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const typeorm_2 = require("typeorm");
let FonctionService = class FonctionService {
    constructor(fonctionRepository) {
        this.fonctionRepository = fonctionRepository;
    }
    async findOne(donnees) {
        return await this.fonctionRepository
            .createQueryBuilder("f")
            .select([
            "f.id AS id", "f.date_debut_fonction AS date_debut_fonction",
            "p.nom AS nom_poste", "p.categorie AS categorie_poste",
            "m.prenom_usuel AS prenom_usuel"
        ])
            .innerJoin(output_1.Membre, "m", "f.id_membre=m.id")
            .innerJoin(output_1.Poste, "p", "p.id=f.id_poste")
            .where("m.id=:identifiant", { identifiant: donnees.id })
            .getRawOne();
    }
    async create(id_membre, donnees) {
        await this.fonctionRepository
            .createQueryBuilder()
            .insert()
            .into(output_1.Fonction)
            .values({
            idMembre: id_membre,
            idPoste: donnees.id_poste
        })
            .execute();
    }
    async update(id_membre, donnees) {
        await this.fonctionRepository
            .createQueryBuilder()
            .update(output_1.Fonction)
            .set({
            idPoste: donnees.id_poste
        })
            .where("id=:id AND id_membre=:identifiant", {
            id: donnees.id,
            identifiant: id_membre
        })
            .execute();
    }
};
FonctionService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Fonction)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], FonctionService);
exports.FonctionService = FonctionService;
//# sourceMappingURL=fonction.service.js.map