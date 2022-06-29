import { Body, Controller, Get, NotAcceptableException, 
    Post, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { FormationsCreateDto } from './dto/formations.dto';
import { FormationsService } from './formations.service';

@Controller('formations')
export class FormationsController {
    constructor(private readonly formationsService: FormationsService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getFormations(@Request() req: any) {
        const data = { id: parseInt(req.user.id) };
        return await this.formationsService.findOne(data);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createFormations(@Body() donnees: FormationsCreateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        const data = { ...donnees, id_membre: parseInt(req.user.id) };
        return await this.formationsService.create(donnees)
    }

}
