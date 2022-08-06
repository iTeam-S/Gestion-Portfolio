import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { CategorieCompetence, Competences, Membre } from 'src/output';
import { CompetencesController } from './competences.controller';
import { CompetencesService } from './competences.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Competences, Membre, CategorieCompetence])
  ],
  exports: [TypeOrmModule],
  controllers: [CompetencesController],
  providers: [CompetencesService]
})
export class CompetencesModule {}
