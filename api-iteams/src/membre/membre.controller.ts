import { Body, Controller, Get, NotAcceptableException, Patch, 
    Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ApiBearerAuth } from '@nestjs/swagger';
import { UpdateInfoDto, UpdatePasswordDto } from './dto';
import { MembreService } from './membre.service';

@ApiBearerAuth()
@Controller('membre')
export class MembreController {
    constructor(private readonly membreService: MembreService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getMembre(@Request() req: any) {
        const donnees = { id: parseInt(req.user.id) };
        return await this.membreService.findOne(donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Patch('update-info')
    async updateInfoMembre(@Body() donnees: UpdateInfoDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.membreService.updateInfo(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Patch('update-password')
    async updatePasswordMembre(@Body() donnees: UpdatePasswordDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.membreService.updatePassword(parseInt(req.user.id), donnees);
    }
}
