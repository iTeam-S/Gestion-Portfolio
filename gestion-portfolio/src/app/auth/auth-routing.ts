import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";
import { AuthComponent } from "./components/auth/auth.component";
import { ForgotPasswordComponent } from "./components/forgot-password/forgot-password.component";

const routes: Routes = [
    { path: '', component: AuthComponent },
    { path: 'forgot-password', component: ForgotPasswordComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class AuthRoutingModule { }
