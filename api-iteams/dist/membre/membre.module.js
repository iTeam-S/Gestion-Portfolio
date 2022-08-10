"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.MembreModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const output_1 = require("../output");
const membre_controller_1 = require("./membre.controller");
const membre_service_1 = require("./membre.service");
let MembreModule = class MembreModule {
};
MembreModule = __decorate([
    (0, common_1.Module)({
        imports: [
            typeorm_1.TypeOrmModule.forFeature([output_1.Membre])
        ],
        exports: [typeorm_1.TypeOrmModule],
        controllers: [membre_controller_1.MembreController],
        providers: [membre_service_1.MembreService]
    })
], MembreModule);
exports.MembreModule = MembreModule;
//# sourceMappingURL=membre.module.js.map