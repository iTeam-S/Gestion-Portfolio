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
exports.CompetencesController = void 0;
const common_1 = require("@nestjs/common");
const passport_1 = require("@nestjs/passport");
const swagger_1 = require("@nestjs/swagger");
const competences_service_1 = require("./competences.service");
const dto_1 = require("./dto");
let CompetencesController = class CompetencesController {
    constructor(competencesService) {
        this.competencesService = competencesService;
    }
    async getCompetences(req) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.competencesService.findOne(donnees);
    }
    async createCompetences(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.competencesService.create(parseInt(req.user.id), donnees);
    }
    async updateCompetences(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.competencesService.update(parseInt(req.user.id), donnees);
    }
    async removeCompetences(donnees) {
        return await this.competencesService.remove(donnees);
    }
};
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Get)(),
    __param(0, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], CompetencesController.prototype, "getCompetences", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Post)('create'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.CompetencesCreateDto, Object]),
    __metadata("design:returntype", Promise)
], CompetencesController.prototype, "createCompetences", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Put)('update'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.CompetencesUpdateDto, Object]),
    __metadata("design:returntype", Promise)
], CompetencesController.prototype, "updateCompetences", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Delete)('remove/:id'),
    __param(0, (0, common_1.Param)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], CompetencesController.prototype, "removeCompetences", null);
CompetencesController = __decorate([
    (0, swagger_1.ApiBearerAuth)(),
    (0, common_1.Controller)('competences'),
    __metadata("design:paramtypes", [competences_service_1.CompetencesService])
], CompetencesController);
exports.CompetencesController = CompetencesController;
//# sourceMappingURL=competences.controller.js.map