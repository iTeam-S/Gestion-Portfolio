import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthComponent } from './components/auth/auth.component';
import { ForgotPasswordComponent } from './components/forgot-password/forgot-password.component';
import { ReactiveFormsModule } from '@angular/forms';
import { AuthRoutingModule } from './auth-routing';

@NgModule({
  declarations: [
    AuthComponent,
    ForgotPasswordComponent
  ],
  imports: [
    CommonModule,
    AuthRoutingModule,
    ReactiveFormsModule
  ],
  exports: [
    AuthComponent,
    ForgotPasswordComponent
  ]
})
export class AuthModule { }
