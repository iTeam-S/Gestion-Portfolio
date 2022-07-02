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
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.MembreController = void 0;
const common_1 = require("@nestjs/common");
const passport_1 = require("@nestjs/passport");
const dto_1 = require("./dto");
const membre_service_1 = require("./membre.service");
let MembreController = class MembreController {
    constructor(membreService) {
        this.membreService = membreService;
    }
    async getMembre(req) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.membreService.findOne(donnees);
    }
    async updateInfoMembre(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.membreService.updateInfo(parseInt(req.user.id), donnees);
    }
    async updatePasswordMembre(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.membreService.updatePassword(parseInt(req.user.id), donnees);
    }
};
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Get)(),
    __param(0, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], MembreController.prototype, "getMembre", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Patch)('update-info'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.UpdateInfoDto, Object]),
    __metadata("design:returntype", Promise)
], MembreController.prototype, "updateInfoMembre", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Patch)('update-password'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.UpdatePasswordDto, Object]),
    __metadata("design:returntype", Promise)
], MembreController.prototype, "updatePasswordMembre", null);
MembreController = __decorate([
    (0, common_1.Controller)('membre'),
    __metadata("design:paramtypes", [membre_service_1.MembreService])
], MembreController);
exports.MembreController = MembreController;
//# sourceMappingURL=membre.controller.js.map