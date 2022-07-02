import { Controller, Get, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { AutresService } from './autres.service';

@Controller('autres')
export class AutresController {
    constructor(private readonly autresService: AutresService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getAutres(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.autresService.findOne(donnees);
    }
}
