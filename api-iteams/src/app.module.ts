import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { ConfigModule } from '@nestjs/config';

import { Autres, CategorieCompetence, Competences, 
  Distinctions, Experiences, Fonction, Formations, 
  Membre, Poste, Projets } from './output';

import { MembreModule } from './membre/membre.module';
import { FonctionModule } from './fonction/fonction.module';
import { FormationsModule } from './formations/formations.module';
import { CompetencesModule } from './competences/competences.module';
import { ExperiencesModule } from './experiences/experiences.module';
import { DistinctionsModule } from './distinctions/distinctions.module';
import { ProjetsModule } from './projets/projets.module';
import { AutresModule } from './autres/autres.module';
import { AuthModule } from './auth/auth.module';

@Module({
  imports: [
    ConfigModule.forRoot({
      envFilePath: '.env'
    }),
    TypeOrmModule.forRoot({
      type: "mariadb",
      host: process.env.DB_HOST,
      port: parseInt(process.env.DB_PORT),
      username: process.env.DB_USER,
      password: process.env.DB_PASSWORD,
      database: process.env.DB_NAME,
      entities: [
        Membre, Fonction, Poste, Formations, Competences,
        CategorieCompetence, Experiences, Distinctions, 
        Projets, Autres
      ],
      synchronize: true,
      autoLoadEntities: true
    }),
    MembreModule, FonctionModule, FormationsModule, 
    CompetencesModule, ExperiencesModule, DistinctionsModule, 
    ProjetsModule, AutresModule, AuthModule
  ],
})
export class AppModule {}
