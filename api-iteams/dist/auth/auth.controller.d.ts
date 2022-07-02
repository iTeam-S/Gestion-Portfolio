import { AuthService } from './auth.service';
import { authMembreDto } from './dto';
export declare class AuthController {
    private readonly authService;
    constructor(authService: AuthService);
    signinMembre(donnees: authMembreDto): Promise<import("./dto").ResponseTokenDto>;
}
