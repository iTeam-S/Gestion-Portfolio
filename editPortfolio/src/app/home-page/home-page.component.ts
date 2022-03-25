import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { AuthService } from '../services/auth.service';


@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.scss']
})
export class HomePageComponent implements OnInit {

  loginForm!: FormGroup;
  inputPasswordType!: string;

  constructor(private formBuilder: FormBuilder, 
      private auth: AuthService) { }

  ngOnInit(): void {
    this.inputPasswordType = "password";
    this.loginForm = this.formBuilder.group({
      identifiant: [null, Validators.required],
      password: [null, Validators.required]
    });
  }

  onShowPassword(event:any): void {
    event.target.checked ? this.inputPasswordType = "text" : this.inputPasswordType = "password";
  }

  onSubmitLogin(): void {
    this.auth.authentifier(this.loginForm.value).pipe(
      tap((data) => console.log(data))
    ).subscribe();
  }
}
