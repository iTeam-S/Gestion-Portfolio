import { Body, Controller, Get, NotAcceptableException, 
    Patch, Post, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { FonctionUpdateDto } from './dto';
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
        return await this.fonctionService.create(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Patch('update')
    async updateFonction(@Body() donnees: FonctionUpdateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.fonctionService.update(parseInt(req.user.id), donnees);
    }
}
