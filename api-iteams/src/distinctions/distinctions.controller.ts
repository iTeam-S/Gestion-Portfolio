import { Body, Controller, Get, NotAcceptableException, Post, Put, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { DistinctionsService } from './distinctions.service';
import { DistinctionsCreateDto, DistinctionsUpdateDto } from './dto';

@Controller('distinctions')
export class DistinctionsController {
    constructor(private readonly distinctionsService: DistinctionsService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getDistinctions(@Request() req: any) {
        const data = { id: parseInt(req.user.id) };
        return await this.distinctionsService.findOne(data);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Post('create')
    async createDistinctions(@Body() donnees: DistinctionsCreateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.distinctionsService.create(parseInt(req.user.id), donnees);
    }

    @UseGuards(AuthGuard('jwtMembre'))
    @Put('update')
    async updateDistinctions(@Body() donnees: DistinctionsUpdateDto, 
        @Request() req: any) {
        if(!donnees) throw new NotAcceptableException("Credentials incorrects !");
        return await this.distinctionsService.update(parseInt(req.user.id), donnees);
    }
}
