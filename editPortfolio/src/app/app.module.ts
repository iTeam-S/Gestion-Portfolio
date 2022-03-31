import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HomePageComponent } from './home-page/home-page.component';
import { AppRoutingModule } from './app-routing.module';
import { ForgotPasswordPageComponent } from './forgot-password-page/forgot-password-page.component';
import { HttpClientModule } from '@angular/common/http';
import { httpInterceptorProviders } from './interceptors';
import { EditPortfolioComponent } from './edit-portfolio/edit-portfolio.component';
import { MenuPortfolioComponent } from './menu-portfolio/menu-portfolio.component';
import { MembreSectionComponent } from './membre-section/membre-section.component';
import { FonctionSectionComponent } from './fonction-section/fonction-section.component';
import { FormationsSectionComponent } from './formations-section/formations-section.component';
import { ExperiencesSectionComponent } from './experiences-section/experiences-section.component';
import { CompetencesSectionComponent } from './competences-section/competences-section.component';
import { DistinctionsSectionComponent } from './distinctions-section/distinctions-section.component';
import { ProjetsSectionComponent } from './projets-section/projets-section.component';
import { AutresSectionComponent } from './autres-section/autres-section.component';
import { FooterSectionComponent } from './footer-section/footer-section.component';

@NgModule({
  declarations: [
    AppComponent,
    HomePageComponent,
    ForgotPasswordPageComponent,
    EditPortfolioComponent,
    MenuPortfolioComponent,
    MembreSectionComponent,
    FonctionSectionComponent,
    FormationsSectionComponent,
    ExperiencesSectionComponent,
    CompetencesSectionComponent,
    DistinctionsSectionComponent,
    ProjetsSectionComponent,
    AutresSectionComponent,
    FooterSectionComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [
    httpInterceptorProviders
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
