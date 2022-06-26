import { Module } from '@nestjs/common';
import { FonctionController } from './fonction.controller';
import { FonctionService } from './fonction.service';

@Module({
  controllers: [FonctionController],
  providers: [FonctionService]
})
export class FonctionModule {}
