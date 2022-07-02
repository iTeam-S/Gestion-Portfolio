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
exports.Traduction = void 0;
const typeorm_1 = require("typeorm");
let Traduction = class Traduction {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], Traduction.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "cle", nullable: true, unique: true, length: 100 }),
    __metadata("design:type", String)
], Traduction.prototype, "cle", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "fr", nullable: true }),
    __metadata("design:type", String)
], Traduction.prototype, "fr", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "en", nullable: true }),
    __metadata("design:type", String)
], Traduction.prototype, "en", void 0);
__decorate([
    (0, typeorm_1.Column)("text", { name: "mg", nullable: true }),
    __metadata("design:type", String)
], Traduction.prototype, "mg", void 0);
Traduction = __decorate([
    (0, typeorm_1.Index)("cle", ["cle"], { unique: true }),
    (0, typeorm_1.Entity)("traduction", { schema: "ITEAMS" })
], Traduction);
exports.Traduction = Traduction;
//# sourceMappingURL=Traduction.js.map