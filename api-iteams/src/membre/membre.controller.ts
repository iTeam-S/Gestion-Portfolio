import { Body, Controller, Get, NotAcceptableException, Patch, 
    Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { UpdateInfoDto } from './dto/membre.dto';
import { MembreService } from './membre.service';

@Controller('membre')
export class MembreController {
    constructor(private readonly membreService: MembreService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getMembre(@Request() req: any) {
        const donnees = { id: req.user.id };
        return await this.membreService.findOne(donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Patch('update-info')
    async updateInfoMembre(@Body() donnees: UpdateInfoDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.membreService.updateInfo(req.user.id, donnees);
    }
}
