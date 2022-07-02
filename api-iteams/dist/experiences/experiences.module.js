"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.ExperiencesModule = void 0;
const common_1 = require("@nestjs/common");
const experiences_service_1 = require("./experiences.service");
const experiences_controller_1 = require("./experiences.controller");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
let ExperiencesModule = class ExperiencesModule {
};
ExperiencesModule = __decorate([
    (0, common_1.Module)({
        imports: [
            typeorm_1.TypeOrmModule.forFeature([output_1.Experiences])
        ],
        providers: [experiences_service_1.ExperiencesService],
        controllers: [experiences_controller_1.ExperiencesController]
    })
], ExperiencesModule);
exports.ExperiencesModule = ExperiencesModule;
//# sourceMappingURL=experiences.module.js.map