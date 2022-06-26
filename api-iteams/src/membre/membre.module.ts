import { Module } from '@nestjs/common';
import { MembreController } from './membre.controller';
import { MembreService } from './membre.service';

@Module({
  controllers: [MembreController],
  providers: [MembreService]
})
export class MembreModule {}
