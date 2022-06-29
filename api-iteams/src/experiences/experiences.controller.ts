import { Body, Controller, Get, NotAcceptableException, Post, Put, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ExperiencesCreateDto, ExperiencesUpdateDto } from './dto/experiences.dto';
import { ExperiencesService } from './experiences.service';

@Controller('experiences')
export class ExperiencesController {
    constructor(private readonly experiencesService: ExperiencesService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getExperiences(@Request() req: any) {
        const data = { id: parseInt(req.user.id) };
        return await this.experiencesService.findOne(data);
    }
    
    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createExperiences(@Body() donnees: ExperiencesCreateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        const data = { ...donnees, id_membre: parseInt(req.user.id) };
        return await this.experiencesService.create(data);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateExperiences(@Body() donnees: ExperiencesUpdateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        const data = { ...donnees, id_membre: parseInt(req.user.id) };
        return await this.experiencesService.update(data);
    }
}
