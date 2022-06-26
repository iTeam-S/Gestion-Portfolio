import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Membre } from 'src/output';
import { MembreController } from './membre.controller';
import { MembreService } from './membre.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Membre])
  ],
  controllers: [MembreController],
  providers: [MembreService]
})
export class MembreModule {}
