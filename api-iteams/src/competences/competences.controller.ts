import { Body, Controller, Get, NotAcceptableException, Post, Put, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { CompetencesService } from './competences.service';
import { CompetencesCreateDto, CompetencesUpdateDto } from './dto';

@Controller('competences')
export class CompetencesController {
    constructor(private readonly competencesService: CompetencesService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getCompetences(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.competencesService.findOne(donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createCompetences(@Body() donnees: CompetencesCreateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.competencesService.create(parseInt(req.user.id), donnees);
    }

    @Put('update')
    async updateCompetences(@Body() donnees: CompetencesUpdateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.competencesService.update(parseInt(req.user.id), donnees);
    }
}
