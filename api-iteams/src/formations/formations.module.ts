import { Module } from '@nestjs/common';
import { FormationsService } from './formations.service';
import { FormationsController } from './formations.controller';

@Module({
  providers: [FormationsService],
  controllers: [FormationsController]
})
export class FormationsModule {}
