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
exports.Membre = void 0;
const typeorm_1 = require("typeorm");
const Competences_1 = require("./Competences");
const Experiences_1 = require("./Experiences");
const Fonction_1 = require("./Fonction");
const Formations_1 = require("./Formations");
let Membre = class Membre {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Membre.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "nom", length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "nom", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "prenom", length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "prenom", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", {
        name: "prenom_usuel",
        nullable: true,
        unique: true,
        length: 50,
    }),
    __metadata("design:type", String)
], Membre.prototype, "prenomUsuel", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "user_github", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "userGithub", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "user_github_pic", nullable: true, length: 255 }),
    __metadata("design:type", String)
], Membre.prototype, "userGithubPic", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "tel1", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "tel1", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "tel2", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "tel2", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "mail", length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "mail", void 0);
__decorate([
    (0, typeorm_1.Column)("date", { name: "date_d_adhesion", default: () => "'curdate()'" }),
    __metadata("design:type", String)
], Membre.prototype, "dateDAdhesion", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "facebook", nullable: true, length: 255 }),
    __metadata("design:type", String)
], Membre.prototype, "facebook", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "linkedin", nullable: true, length: 255 }),
    __metadata("design:type", String)
], Membre.prototype, "linkedin", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "actif", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Membre.prototype, "actif", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "cv", nullable: true }),
    __metadata("design:type", String)
], Membre.prototype, "cv", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "adresse", nullable: true }),
    __metadata("design:type", String)
], Membre.prototype, "adresse", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "description", nullable: true }),
    __metadata("design:type", String)
], Membre.prototype, "description", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "fonction", nullable: true }),
    __metadata("design:type", String)
], Membre.prototype, "fonction", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "password", nullable: true, length: 512 }),
    __metadata("design:type", String)
], Membre.prototype, "password", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", {
        name: "pdc",
        nullable: true,
        length: 255,
        default: () => "'./libs/img/banner.png'",
    }),
    __metadata("design:type", String)
], Membre.prototype, "pdc", void 0);
__decorate([
    (0, typeorm_1.Column)("tinyint", { name: "dark", width: 1, default: () => "'0'" }),
    __metadata("design:type", Boolean)
], Membre.prototype, "dark", void 0);
__decorate([
    (0, typeorm_1.Column)("int", {
        name: "point_experience",
        nullable: true,
        default: () => "'0'",
    }),
    __metadata("design:type", Number)
], Membre.prototype, "pointExperience", void 0);
__decorate([
    (0, typeorm_1.Column)("enum", {
        name: "role",
        enum: ["admin", "user"],
        default: ["user"],
    }),
    __metadata("design:type", String)
], Membre.prototype, "role", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Competences_1.Competences, (competences) => competences.idMembre2),
    __metadata("design:type", Array)
], Membre.prototype, "competences", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Experiences_1.Experiences, (experiences) => experiences.idMembre2),
    __metadata("design:type", Array)
], Membre.prototype, "experiences", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Fonction_1.Fonction, (fonction) => fonction.idMembre2),
    __metadata("design:type", Array)
], Membre.prototype, "fonctions", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Formations_1.Formations, (formations) => formations.idMembre2),
    __metadata("design:type", Array)
], Membre.prototype, "formations", void 0);
Membre = __decorate([
    (0, typeorm_1.Index)("prenom_usuel", ["prenomUsuel"], { unique: true }),
    (0, typeorm_1.Entity)("membre", { schema: "ITEAMS" })
], Membre);
exports.Membre = Membre;
//# sourceMappingURL=Membre.js.map