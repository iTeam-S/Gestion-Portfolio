"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.AppModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const config_1 = require("@nestjs/config");
const output_1 = require("./output");
const membre_module_1 = require("./membre/membre.module");
const fonction_module_1 = require("./fonction/fonction.module");
const formations_module_1 = require("./formations/formations.module");
const competences_module_1 = require("./competences/competences.module");
const experiences_module_1 = require("./experiences/experiences.module");
const distinctions_module_1 = require("./distinctions/distinctions.module");
const projets_module_1 = require("./projets/projets.module");
const autres_module_1 = require("./autres/autres.module");
const auth_module_1 = require("./auth/auth.module");
let AppModule = class AppModule {
};
AppModule = __decorate([
    (0, common_1.Module)({
        imports: [
            config_1.ConfigModule.forRoot({
                envFilePath: '.env'
            }),
            typeorm_1.TypeOrmModule.forRoot({
                type: "mariadb",
                host: process.env.DB_HOST,
                port: parseInt(process.env.DB_PORT),
                username: process.env.DB_USER,
                password: process.env.DB_PASSWORD,
                database: process.env.DB_NAME,
                entities: [
                    output_1.Membre, output_1.Fonction, output_1.Poste, output_1.Formations, output_1.Competences,
                    output_1.CategorieCompetence, output_1.Experiences, output_1.Distinctions,
                    output_1.Projets, output_1.Autres
                ],
                synchronize: true,
                autoLoadEntities: true
            }),
            membre_module_1.MembreModule, fonction_module_1.FonctionModule, formations_module_1.FormationsModule,
            competences_module_1.CompetencesModule, experiences_module_1.ExperiencesModule, distinctions_module_1.DistinctionsModule,
            projets_module_1.ProjetsModule, autres_module_1.AutresModule, auth_module_1.AuthModule
        ],
    })
], AppModule);
exports.AppModule = AppModule;
//# sourceMappingURL=app.module.js.map