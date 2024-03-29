import { Module } from '@nestjs/common';
import { ExperiencesService } from './experiences.service';
import { ExperiencesController } from './experiences.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Experiences, Membre } from 'src/output';

@Module({
  imports: [
    TypeOrmModule.forFeature([Experiences, Membre])
  ],
  exports: [TypeOrmModule],
  providers: [ExperiencesService],
  controllers: [ExperiencesController]
})
export class ExperiencesModule {}
