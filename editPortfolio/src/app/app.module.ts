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

@NgModule({
  declarations: [
    AppComponent,
    HomePageComponent,
    ForgotPasswordPageComponent,
    EditPortfolioComponent,
    MenuPortfolioComponent,
    MembreSectionComponent,
    FonctionSectionComponent,
    FormationsSectionComponent
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
