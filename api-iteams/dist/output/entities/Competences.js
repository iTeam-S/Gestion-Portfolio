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
exports.Competences = void 0;
const typeorm_1 = require("typeorm");
const Membre_1 = require("./Membre");
let Competences = class Competences {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Competences.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "nom", length: 100 }),
    __metadata("design:type", String)
], Competences.prototype, "nom", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "liste" }),
    __metadata("design:type", String)
], Competences.prototype, "liste", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_categorie" }),
    __metadata("design:type", Number)
], Competences.prototype, "idCategorie", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_membre" }),
    __metadata("design:type", Number)
], Competences.prototype, "idMembre", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "ordre" }),
    __metadata("design:type", Number)
], Competences.prototype, "ordre", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Membre_1.Membre, (membre) => membre.competences, {
        onDelete: "CASCADE",
        onUpdate: "RESTRICT",
    }),
    (0, typeorm_1.JoinColumn)([{ name: "id_membre", referencedColumnName: "id" }]),
    __metadata("design:type", Membre_1.Membre)
], Competences.prototype, "idMembre2", void 0);
Competences = __decorate([
    (0, typeorm_1.Index)("FK_competences_membre", ["idMembre"], {}),
    (0, typeorm_1.Index)("FK_competences_categorie_competence", ["idCategorie"], {}),
    (0, typeorm_1.Entity)("competences", { schema: "ITEAMS" })
], Competences);
exports.Competences = Competences;
//# sourceMappingURL=Competences.js.map