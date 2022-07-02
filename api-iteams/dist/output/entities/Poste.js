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
exports.Poste = void 0;
const typeorm_1 = require("typeorm");
let Poste = class Poste {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Poste.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "nom", length: 50 }),
    __metadata("design:type", String)
], Poste.prototype, "nom", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "categorie", nullable: true, length: 50 }),
    __metadata("design:type", String)
], Poste.prototype, "categorie", void 0);
Poste = __decorate([
    (0, typeorm_1.Entity)("poste", { schema: "ITEAMS" })
], Poste);
exports.Poste = Poste;
//# sourceMappingURL=Poste.js.map