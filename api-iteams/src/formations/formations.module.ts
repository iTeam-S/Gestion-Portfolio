import { Module } from '@nestjs/common';
import { FormationsService } from './formations.service';
import { FormationsController } from './formations.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Formations, Membre } from 'src/output';

@Module({
  imports: [
    TypeOrmModule.forFeature([Formations, Membre])
  ],
  exports: [TypeOrmModule],
  providers: [FormationsService],
  controllers: [FormationsController]
})
export class FormationsModule {}
