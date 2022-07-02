import { Body, Controller, Get, NotAcceptableException, Post, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { AutresService } from './autres.service';
import { AutresCreateDto } from './dto/autres.dto';

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
}
