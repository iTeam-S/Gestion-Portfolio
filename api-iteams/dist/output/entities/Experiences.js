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
exports.Experiences = void 0;
const typeorm_1 = require("typeorm");
const Membre_1 = require("./Membre");
let Experiences = class Experiences {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Experiences.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "nom", nullable: true }),
    __metadata("design:type", String)
], Experiences.prototype, "nom", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "annee", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Experiences.prototype, "annee", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "type", nullable: true }),
    __metadata("design:type", String)
], Experiences.prototype, "type", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "description", nullable: true }),
    __metadata("design:type", String)
], Experiences.prototype, "description", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_membre" }),
    __metadata("design:type", Number)
], Experiences.prototype, "idMembre", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "ordre" }),
    __metadata("design:type", Number)
], Experiences.prototype, "ordre", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Membre_1.Membre, (membre) => membre.experiences, {
        onDelete: "CASCADE",
        onUpdate: "RESTRICT",
    }),
    (0, typeorm_1.JoinColumn)([{ name: "id_membre", referencedColumnName: "id" }]),
    __metadata("design:type", Membre_1.Membre)
], Experiences.prototype, "idMembre2", void 0);
Experiences = __decorate([
    (0, typeorm_1.Index)("id_membre", ["idMembre"], {}),
    (0, typeorm_1.Entity)("experiences", { schema: "ITEAMS" })
], Experiences);
exports.Experiences = Experiences;
//# sourceMappingURL=Experiences.js.map