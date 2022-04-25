import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthComponent } from './components/auth/auth.component';
import { ForgotPasswordComponent } from './components/forgot-password/forgot-password.component';
import { ReactiveFormsModule } from '@angular/forms';



@NgModule({
  declarations: [
    AuthComponent,
    ForgotPasswordComponent
  ],
  imports: [
    CommonModule,
    AuthModule,
    ReactiveFormsModule
  ],
  exports: [
    AuthComponent,
    ForgotPasswordComponent
  ]
})
export class AuthModule { }
