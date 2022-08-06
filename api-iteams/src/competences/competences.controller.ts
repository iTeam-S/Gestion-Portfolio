import { Body, Controller, Delete, Get, 
    NotAcceptableException, Post, Put, 
    Request, UseGuards, Param } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ApiBearerAuth } from '@nestjs/swagger';
import { CompetencesService } from './competences.service';
import { CompetencesCreateDto, CompetencesUpdateDto } from './dto';

@ApiBearerAuth()
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
    
    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateCompetences(@Body() donnees: CompetencesUpdateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.competencesService.update(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Delete('remove/:id')
    async removeCompetences(@Param() donnees: { id: number }) {
        return await this.competencesService.remove(donnees);
    }
}
