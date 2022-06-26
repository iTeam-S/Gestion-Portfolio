import { Module } from '@nestjs/common';
import { ProjetsService } from './projets.service';
import { ProjetsController } from './projets.controller';

@Module({
  providers: [ProjetsService],
  controllers: [ProjetsController]
})
export class ProjetsModule {}
