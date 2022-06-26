import { Module } from '@nestjs/common';
import { AutresController } from './autres.controller';
import { AutresService } from './autres.service';

@Module({
  controllers: [AutresController],
  providers: [AutresService]
})
export class AutresModule {}
