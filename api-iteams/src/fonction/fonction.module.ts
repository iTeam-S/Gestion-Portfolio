import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Fonction } from 'src/output';
import { FonctionController } from './fonction.controller';
import { FonctionService } from './fonction.service';

@Module({
  imports:[
    TypeOrmModule.forFeature([Fonction])
  ],
  controllers: [FonctionController],
  providers: [FonctionService]
})
export class FonctionModule {}
