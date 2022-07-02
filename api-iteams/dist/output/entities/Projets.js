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
exports.Projets = void 0;
const typeorm_1 = require("typeorm");
let Projets = class Projets {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Projets.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "nom", length: 255 }),
    __metadata("design:type", String)
], Projets.prototype, "nom", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "description" }),
    __metadata("design:type", String)
], Projets.prototype, "description", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "lien" }),
    __metadata("design:type", String)
], Projets.prototype, "lien", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "pdc" }),
    __metadata("design:type", String)
], Projets.prototype, "pdc", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_membre" }),
    __metadata("design:type", Number)
], Projets.prototype, "idMembre", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "ordre" }),
    __metadata("design:type", Number)
], Projets.prototype, "ordre", void 0);
Projets = __decorate([
    (0, typeorm_1.Entity)("projets", { schema: "ITEAMS" })
], Projets);
exports.Projets = Projets;
//# sourceMappingURL=Projets.js.map