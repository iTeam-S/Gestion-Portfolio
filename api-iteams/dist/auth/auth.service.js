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
exports.AuthService = void 0;
const common_1 = require("@nestjs/common");
const jwt_1 = require("@nestjs/jwt");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const output_1 = require("../output");
let AuthService = class AuthService {
    constructor(authRepository, jwtService) {
        this.authRepository = authRepository;
        this.jwtService = jwtService;
    }
    async signMembre(donnees) {
        return await this.jwtService.signAsync({
            id: donnees.id,
            prenom: donnees.prenom_usuel,
            mail: donnees.mail
        });
    }
    async authMembre(donnees) {
        const reponse = await this.authRepository
            .createQueryBuilder("m")
            .select([
            "m.id AS id", "m.prenom_usuel AS prenom_usuel",
            "m.mail AS mail",
        ])
            .where(`(m.prenom_usuel=:identifiant 
                OR m.mail=:identifiant) 
                AND m.password=SHA2(:key, 256)`, {
            identifiant: donnees.identifiant,
            key: donnees.password
        })
            .getRawOne();
        if (!reponse)
            throw new common_1.UnauthorizedException("Credentials incorrects !");
        return {
            access_token: await this.signMembre(reponse)
        };
    }
};
AuthService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(output_1.Membre)),
    __metadata("design:paramtypes", [typeorm_2.Repository,
        jwt_1.JwtService])
], AuthService);
exports.AuthService = AuthService;
//# sourceMappingURL=auth.service.js.map