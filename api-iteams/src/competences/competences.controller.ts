import { Body, Controller, Get, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { CompetencesService } from './competences.service';

@Controller('competences')
export class CompetencesController {
    constructor(private readonly competencesService: CompetencesService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getCompetences(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.competencesService.findOne(donnees);
    }
}
