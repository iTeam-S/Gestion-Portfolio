import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Distinctions, Membre } from 'src/output';
import { DistinctionsController } from './distinctions.controller';
import { DistinctionsService } from './distinctions.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Distinctions, Membre])
  ],
  exports: [TypeOrmModule],
  controllers: [DistinctionsController],
  providers: [DistinctionsService]
})
export class DistinctionsModule {}
