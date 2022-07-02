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
exports.FormationsController = void 0;
const common_1 = require("@nestjs/common");
const passport_1 = require("@nestjs/passport");
const dto_1 = require("./dto");
const formations_service_1 = require("./formations.service");
let FormationsController = class FormationsController {
    constructor(formationsService) {
        this.formationsService = formationsService;
    }
    async getFormations(req) {
        const data = { id: parseInt(req.user.id) };
        return await this.formationsService.findOne(data);
    }
    async createFormations(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.formationsService.create(parseInt(req.user.id), donnees);
    }
    async updateFormations(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.formationsService.update(parseInt(req.user.id), donnees);
    }
    async deleteFormations(donnees) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.formationsService.remove(donnees);
    }
};
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Get)(),
    __param(0, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], FormationsController.prototype, "getFormations", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Post)('create'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.FormationsCreateDto, Object]),
    __metadata("design:returntype", Promise)
], FormationsController.prototype, "createFormations", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Put)('update'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.FormationsUpdateDto, Object]),
    __metadata("design:returntype", Promise)
], FormationsController.prototype, "updateFormations", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Delete)('remove'),
    __param(0, (0, common_1.Body)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], FormationsController.prototype, "deleteFormations", null);
FormationsController = __decorate([
    (0, common_1.Controller)('formations'),
    __metadata("design:paramtypes", [formations_service_1.FormationsService])
], FormationsController);
exports.FormationsController = FormationsController;
//# sourceMappingURL=formations.controller.js.map