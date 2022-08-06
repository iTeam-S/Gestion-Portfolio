import { Body, Controller, Delete, Get, NotAcceptableException, 
    Post, Put, Request, UseGuards, Param } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { ApiBearerAuth } from '@nestjs/swagger';
import { FormationsCreateDto, FormationsUpdateDto } from './dto';
import { FormationsService } from './formations.service';

@ApiBearerAuth()
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
        return await this.formationsService.create(parseInt(req.user.id), donnees)
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateFormations(@Body() donnees: FormationsUpdateDto,
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.formationsService.update(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Delete('remove/:id')
    async deleteFormations(@Param() donnees: { id: number }) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.formationsService.remove(donnees);
    }
}
