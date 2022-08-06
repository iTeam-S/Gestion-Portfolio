import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Autres, Membre } from 'src/output';
import { AutresController } from './autres.controller';
import { AutresService } from './autres.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Autres, Membre])
  ],
  exports: [TypeOrmModule],
  controllers: [AutresController],
  providers: [AutresService]
})
export class AutresModule {}
