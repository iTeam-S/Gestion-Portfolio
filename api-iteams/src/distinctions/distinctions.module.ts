import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Distinctions } from 'src/output';
import { DistinctionsController } from './distinctions.controller';
import { DistinctionsService } from './distinctions.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Distinctions])
  ],
  controllers: [DistinctionsController],
  providers: [DistinctionsService]
})
export class DistinctionsModule {}
