"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.DistinctionsModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const distinctions_controller_1 = require("./distinctions.controller");
const distinctions_service_1 = require("./distinctions.service");
let DistinctionsModule = class DistinctionsModule {
};
DistinctionsModule = __decorate([
    (0, common_1.Module)({
        imports: [
            typeorm_1.TypeOrmModule.forFeature([output_1.Distinctions])
        ],
        controllers: [distinctions_controller_1.DistinctionsController],
        providers: [distinctions_service_1.DistinctionsService]
    })
], DistinctionsModule);
exports.DistinctionsModule = DistinctionsModule;
//# sourceMappingURL=distinctions.module.js.map