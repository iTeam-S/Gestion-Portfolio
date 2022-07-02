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
exports.Estime = void 0;
const typeorm_1 = require("typeorm");
let Estime = class Estime {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Estime.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "motif", nullable: true, length: 512 }),
    __metadata("design:type", String)
], Estime.prototype, "motif", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "point" }),
    __metadata("design:type", Number)
], Estime.prototype, "point", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "id_membre" }),
    __metadata("design:type", Number)
], Estime.prototype, "idMembre", void 0);
Estime = __decorate([
    (0, typeorm_1.Index)("fk_membre", ["idMembre"], {}),
    (0, typeorm_1.Entity)("estime", { schema: "ITEAMS" })
], Estime);
exports.Estime = Estime;
//# sourceMappingURL=Estime.js.map