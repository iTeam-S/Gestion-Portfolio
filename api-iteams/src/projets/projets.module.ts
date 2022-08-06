import { Module } from '@nestjs/common';
import { ProjetsService } from './projets.service';
import { ProjetsController } from './projets.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Membre, Projets } from 'src/output';

@Module({
  imports: [
    TypeOrmModule.forFeature([Projets, Membre])
  ],
  exports: [TypeOrmModule],
  providers: [ProjetsService],
  controllers: [ProjetsController]
})
export class ProjetsModule {}
