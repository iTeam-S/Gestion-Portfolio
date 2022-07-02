import { Module } from '@nestjs/common';
import { ProjetsService } from './projets.service';
import { ProjetsController } from './projets.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Projets } from 'src/output';

@Module({
  imports: [
    TypeOrmModule.forFeature([Projets])
  ],
  providers: [ProjetsService],
  controllers: [ProjetsController]
})
export class ProjetsModule {}
