import { Module } from '@nestjs/common';
import { DistinctionsController } from './distinctions.controller';
import { DistinctionsService } from './distinctions.service';

@Module({
  controllers: [DistinctionsController],
  providers: [DistinctionsService]
})
export class DistinctionsModule {}
