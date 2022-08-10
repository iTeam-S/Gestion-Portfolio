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
exports.DistinctionsController = void 0;
const common_1 = require("@nestjs/common");
const passport_1 = require("@nestjs/passport");
const swagger_1 = require("@nestjs/swagger");
const distinctions_service_1 = require("./distinctions.service");
const dto_1 = require("./dto");
let DistinctionsController = class DistinctionsController {
    constructor(distinctionsService) {
        this.distinctionsService = distinctionsService;
    }
    async getDistinctions(req) {
        const data = { id: parseInt(req.user.id) };
        return await this.distinctionsService.findOne(data);
    }
    async createDistinctions(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.distinctionsService.create(parseInt(req.user.id), donnees);
    }
    async updateDistinctions(donnees, req) {
        if (!donnees)
            throw new common_1.NotAcceptableException("Credentials incorrects !");
        return await this.distinctionsService.update(parseInt(req.user.id), donnees);
    }
    async removeDistinctions(donnees) {
        return await this.distinctionsService.remove(donnees);
    }
};
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Get)(),
    __param(0, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], DistinctionsController.prototype, "getDistinctions", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Post)('create'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.DistinctionsCreateDto, Object]),
    __metadata("design:returntype", Promise)
], DistinctionsController.prototype, "createDistinctions", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Put)('update'),
    __param(0, (0, common_1.Body)()),
    __param(1, (0, common_1.Request)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [dto_1.DistinctionsUpdateDto, Object]),
    __metadata("design:returntype", Promise)
], DistinctionsController.prototype, "updateDistinctions", null);
__decorate([
    (0, common_1.UseGuards)((0, passport_1.AuthGuard)('jwtMembre')),
    (0, common_1.Delete)('remove/:id'),
    __param(0, (0, common_1.Param)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Object]),
    __metadata("design:returntype", Promise)
], DistinctionsController.prototype, "removeDistinctions", null);
DistinctionsController = __decorate([
    (0, swagger_1.ApiBearerAuth)(),
    (0, common_1.Controller)('distinctions'),
    __metadata("design:paramtypes", [distinctions_service_1.DistinctionsService])
], DistinctionsController);
exports.DistinctionsController = DistinctionsController;
//# sourceMappingURL=distinctions.controller.js.map