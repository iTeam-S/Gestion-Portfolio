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
Object.defineProperty(exports, "__esModule", { value: true });
exports.Fonction = void 0;
const typeorm_1 = require("typeorm");
const Membre_1 = require("./Membre");
let Fonction = class Fonction {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Fonction.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("datetime", {
        name: "date_debut_fonction",
        default: () => "'2020-11-20 00:00:00'",
    }),
    __metadata("design:type", Date)
], Fonction.prototype, "dateDebutFonction", void 0);
__decorate([
    (0, typeorm_1.Column)("datetime", { name: "date_fin_fonction", nullable: true }),
    __metadata("design:type", Date)
], Fonction.prototype, "dateFinFonction", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_membre", default: () => "'0'" }),
    __metadata("design:type", Number)
], Fonction.prototype, "idMembre", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_poste", default: () => "'0'" }),
    __metadata("design:type", Number)
], Fonction.prototype, "idPoste", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Membre_1.Membre, (membre) => membre.fonctions, {
        onDelete: "CASCADE",
        onUpdate: "RESTRICT",
    }),
    (0, typeorm_1.JoinColumn)([{ name: "id_membre", referencedColumnName: "id" }]),
    __metadata("design:type", Membre_1.Membre)
], Fonction.prototype, "idMembre2", void 0);
Fonction = __decorate([
    (0, typeorm_1.Index)("FK_fonction_poste", ["idPoste"], {}),
    (0, typeorm_1.Index)("FK_fonction_membre", ["idMembre"], {}),
    (0, typeorm_1.Entity)("fonction", { schema: "ITEAMS" })
], Fonction);
exports.Fonction = Fonction;
//# sourceMappingURL=Fonction.js.map