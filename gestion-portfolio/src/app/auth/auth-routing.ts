import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";
import { AuthComponent } from "./components/auth/auth.component";
import { ForgotPasswordComponent } from "./components/forgot-password/forgot-password.component";

const routes: Routes = [
    { path: 'login', component: AuthComponent },
    { path: 'forgot-password', component: ForgotPasswordComponent },
    { path: '', redirectTo: 'login', pathMatch: 'full' }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class AuthRoutingModule { }
