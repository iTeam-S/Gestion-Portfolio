import { Body, Controller, Delete, Get, Param, 
    NotAcceptableException, Post, Put, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ApiBearerAuth } from '@nestjs/swagger';
import { ProjetsCreateDto, ProjetsUpdateDto } from './dto';
import { ProjetsService } from './projets.service';

@ApiBearerAuth()
@Controller('projets')
export class ProjetsController {
    constructor(private readonly projetsService: ProjetsService) {}
    
    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getProjets(@Request() req: any) {
        const donnes = { id: parseInt(req.user.id) };
        return await this.projetsService.findOne(donnes);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createProjets(@Body() donnees: ProjetsCreateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.projetsService.create(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateProjets(@Body() donnees: ProjetsUpdateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.projetsService.update(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Delete('remove')
    async removeProjets(@Param() donnees: {id: number}) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.projetsService.remove(donnees);
    }
}
