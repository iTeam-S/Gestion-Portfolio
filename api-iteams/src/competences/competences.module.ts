import { Module } from '@nestjs/common';
import { CompetencesController } from './competences.controller';
import { CompetencesService } from './competences.service';

@Module({
  controllers: [CompetencesController],
  providers: [CompetencesService]
})
export class CompetencesModule {}
