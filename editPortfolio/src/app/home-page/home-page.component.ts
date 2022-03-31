import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
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
  erreur!: string;

  constructor(private formBuilder: FormBuilder, 
      private auth: AuthService,
      private router: Router) { }
    
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
      tap((reponses) => {
        if(reponses !== false && reponses.TRUE === '1') {
          localStorage.setItem('lahatra-iTeam-$', reponses.token);
          this.router.navigateByUrl('edit');
        }
        else {
          this.erreur = "Identifiant et/ou mot de passe incorrect(s). Merci !"
          console.log("Erreur:" + reponses);
        }
      })
    ).subscribe();
  }
}
