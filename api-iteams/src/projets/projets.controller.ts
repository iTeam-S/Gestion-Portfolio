import { Controller, Get, Post, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ProjetsService } from './projets.service';

@Controller('projets')
export class ProjetsController {
    constructor(private readonly projetsService: ProjetsService) {}
    
    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getProjets(@Request() req: any) {
        const donnes = { id: parseInt(req.user.id) };
        return await this.projetsService.findOne(donnes);
    }
}
