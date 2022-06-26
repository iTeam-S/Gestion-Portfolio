import { Controller, Get, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { MembreService } from './membre.service';

@Controller('membre')
export class MembreController {
    constructor(private readonly membreService: MembreService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getMembre(@Request() req: any) {
        const donnees = { id: req.user.id };
        return await this.membreService.findOne(donnees);
    }
}
