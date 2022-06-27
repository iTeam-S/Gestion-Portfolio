import { Body, Controller, Get, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { FonctionService } from './fonction.service';

@Controller('fonction')
export class FonctionController {
    constructor(private readonly fonctionService: FonctionService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getFonction(@Request() req: any) {
        const donnees = { id: req.user.id };
        return await this.fonctionService.findOne(donnees);
    }
}
