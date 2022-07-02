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
exports.AmpUser = void 0;
const typeorm_1 = require("typeorm");
let AmpUser = class AmpUser {
};
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: "int", name: "id" }),
    __metadata("design:type", Number)
], AmpUser.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "user_id", unique: true, length: 50 }),
    __metadata("design:type", String)
], AmpUser.prototype, "userId", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "action", nullable: true, length: 50 }),
    __metadata("design:type", String)
], AmpUser.prototype, "action", void 0);
__decorate([
    (0, typeorm_1.Column)("datetime", { name: "last_use", default: () => "CURRENT_TIMESTAMP" }),
    __metadata("design:type", Date)
], AmpUser.prototype, "lastUse", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "lang", nullable: true, length: 5 }),
    __metadata("design:type", String)
], AmpUser.prototype, "lang", void 0);
__decorate([
    (0, typeorm_1.Column)("varchar", { name: "tmp", nullable: true, length: 255 }),
    __metadata("design:type", String)
], AmpUser.prototype, "tmp", void 0);
AmpUser = __decorate([
    (0, typeorm_1.Index)("user_id", ["userId"], { unique: true }),
    (0, typeorm_1.Entity)("amp_user", { schema: "ITEAMS" })
], AmpUser);
exports.AmpUser = AmpUser;
//# sourceMappingURL=AmpUser.js.map