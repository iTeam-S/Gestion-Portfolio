import { Body, Controller, Delete, Get, 
    NotAcceptableException, Post, Put, 
    Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ExperiencesCreateDto, ExperiencesUpdateDto } from './dto';
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
        return await this.experiencesService.create(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateExperiences(@Body() donnees: ExperiencesUpdateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.experiencesService.update(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Delete('remove')
    async removeExperiences(@Body() donnees: {id: number}) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.experiencesService.remove(donnees);
    }
}
