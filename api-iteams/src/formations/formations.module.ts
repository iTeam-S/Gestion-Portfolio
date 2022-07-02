import { Module } from '@nestjs/common';
import { FormationsService } from './formations.service';
import { FormationsController } from './formations.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Formations } from 'src/output';

@Module({
  imports: [
    TypeOrmModule.forFeature([Formations])
  ],
  providers: [FormationsService],
  controllers: [FormationsController]
})
export class FormationsModule {}
