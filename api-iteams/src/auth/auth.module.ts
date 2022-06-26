import { Module } from '@nestjs/common';
import { ConfigModule } from '@nestjs/config';
import { TypeOrmModule } from '@nestjs/typeorm';
import { JwtModule } from '@nestjs/jwt';

import { AuthController } from './auth.controller';
import { AuthService } from './auth.service';

import { Membre } from 'src/output';


@Module({
  imports: [
    ConfigModule.forRoot({
      envFilePath: '.env'
    }),
    TypeOrmModule.forFeature([Membre]),
    JwtModule.register({
      secret: process.env.JWT_SECRET
    })
  ],
  controllers: [AuthController],
  providers: [AuthService]
})
export class AuthModule {}
