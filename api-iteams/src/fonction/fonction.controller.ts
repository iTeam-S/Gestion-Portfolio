import { Body, Controller, Get, NotAcceptableException, Post, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { FonctionService } from './fonction.service';

@Controller('fonction')
export class FonctionController {
    constructor(private readonly fonctionService: FonctionService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getFonction(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.fonctionService.findOne(donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createFonction(@Body() donnees: { id_poste: number },
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        const data = { ...donnees, id_membre: parseInt(req.user.id) };
        return await this.fonctionService.create(data);
    }
}
