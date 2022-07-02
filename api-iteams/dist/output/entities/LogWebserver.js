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
exports.LogWebserver = void 0;
const typeorm_1 = require("typeorm");
let LogWebserver = class LogWebserver {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], LogWebserver.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "ip_adress", nullable: true, length: 2000 }),
    __metadata("design:type", String)
], LogWebserver.prototype, "ipAdress", void 0);
__decorate([
    (0, typeorm_1.Column)("datetime", { name: "date_heure", nullable: true }),
    __metadata("design:type", Date)
], LogWebserver.prototype, "dateHeure", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "methode", nullable: true, length: 2500 }),
    __metadata("design:type", String)
], LogWebserver.prototype, "methode", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "routes", nullable: true, length: 2500 }),
    __metadata("design:type", String)
], LogWebserver.prototype, "routes", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "protocole", nullable: true, length: 2500 }),
    __metadata("design:type", String)
], LogWebserver.prototype, "protocole", void 0);
__decorate([
    (0, typeorm_1.Column)("int", { name: "code_retour", nullable: true }),
    __metadata("design:type", Number)
], LogWebserver.prototype, "codeRetour", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "user_agent", nullable: true, length: 2500 }),
    __metadata("design:type", String)
], LogWebserver.prototype, "userAgent", void 0);
LogWebserver = __decorate([
    (0, typeorm_1.Entity)("log_webserver", { schema: "ITEAMS" })
], LogWebserver);
exports.LogWebserver = LogWebserver;
//# sourceMappingURL=LogWebserver.js.map