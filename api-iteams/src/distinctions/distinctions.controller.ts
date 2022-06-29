import { Controller, Get, Request, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { DistinctionsService } from './distinctions.service';

@Controller('distinctions')
export class DistinctionsController {
    constructor(private readonly distinctionsService: DistinctionsService) {}

    @UseGuards(AuthGuard('jwtMembre'))
    @Get()
    async getDistinctions(@Request() req: any) {
        const data = { id: parseInt(req.user.id) };
        return await this.distinctionsService.findOne(data);
    }
}
