import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { GpRoutingModule } from './gp-routing.module';

import { BodyComponent } from './components/body/body.component';
import { HeaderComponent } from './components/header/header.component';
import { SidenavComponent } from './components/sidenav/sidenav.component';
import { MembreComponent } from './components/membre/membre.component';
import { FormationsComponent } from './components/formations/formations.component';
import { ExperiencesComponent } from './components/experiences/experiences.component';
import { CompetencesComponent } from './components/competences/competences.component';
import { DistinctionsComponent } from './components/distinctions/distinctions.component';
import { ProjetsComponent } from './components/projets/projets.component';
import { AutresComponent } from './components/autres/autres.component';
import { FonctionComponent } from './components/fonction/fonction.component';


@NgModule({
  declarations: [
    BodyComponent,
    HeaderComponent,
    SidenavComponent,
    MembreComponent,
    FormationsComponent,
    ExperiencesComponent,
    CompetencesComponent,
    DistinctionsComponent,
    ProjetsComponent,
    AutresComponent,
    FonctionComponent
  ],
  imports: [
    CommonModule,
    GpRoutingModule,
    ReactiveFormsModule
  ],
  exports: [
    BodyComponent,
    HeaderComponent,
    SidenavComponent,
    MembreComponent,
    FormationsComponent,
    ExperiencesComponent,
    CompetencesComponent,
    DistinctionsComponent,
    ProjetsComponent,
    AutresComponent,
    FonctionComponent
  ]
})
export class GpModule { }
