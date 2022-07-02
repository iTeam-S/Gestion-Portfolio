import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Competences } from 'src/output';
import { CompetencesController } from './competences.controller';
import { CompetencesService } from './competences.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Competences])
  ],
  controllers: [CompetencesController],
  providers: [CompetencesService]
})
export class CompetencesModule {}
