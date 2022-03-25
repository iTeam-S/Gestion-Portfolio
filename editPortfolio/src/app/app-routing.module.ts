import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { EditPortfolioComponent } from './edit-portfolio/edit-portfolio.component';
import { ForgotPasswordPageComponent } from './forgot-password-page/forgot-password-page.component';
import { HomePageComponent } from './home-page/home-page.component';


const routes: Routes = [
    { path: '', component: HomePageComponent },
    { path: 'forgot-password', component: ForgotPasswordPageComponent },
    { path: 'edit', component: EditPortfolioComponent }
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes)
    ],
    exports: [
        RouterModule
    ]
})
export class AppRoutingModule { }
