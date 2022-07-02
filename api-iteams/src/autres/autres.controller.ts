import { Body, Controller, Delete, Get, NotAcceptableException, 
    Post, Put, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { AutresService } from './autres.service';
import { AutresCreateDto, AutresUpdateDto } from './dto';

@Controller('autres')
export class AutresController {
    constructor(private readonly autresService: AutresService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getAutres(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.autresService.findOne(donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createAutres(@Body() donnees: AutresCreateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.autresService.create(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateAutres(@Body() donnees: AutresUpdateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.autresService.update(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Delete('remove')
    async removeAutres(@Body() donnees: {id: number}) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.autresService.remove(donnees);
    }
}
