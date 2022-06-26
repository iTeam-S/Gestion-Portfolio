import { Body, Controller, ForbiddenException, Post } from '@nestjs/common';
import { AuthService } from './auth.service';
import { authMembreDto } from './dto';

@Controller('auth')
export class AuthController {
    constructor(private readonly authService: AuthService) {}
    
    @Post('membre')
    async signinMembre(@Body() donnees: authMembreDto) {
        if(!donnees) throw new ForbiddenException("Credentials incorrects");
        return await this.authService.authMembre(donnees);
    }
}
