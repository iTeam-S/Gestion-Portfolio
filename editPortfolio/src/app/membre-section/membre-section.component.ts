import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Membre, PasswordUpdate } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
import { Observable, tap } from 'rxjs';
declare var window: any;


@Component({
  selector: 'app-membre-section',
  templateUrl: './membre-section.component.html',
  styleUrls: ['./membre-section.component.scss']
})
export class MembreSectionComponent implements OnInit {
  membre!:Membre;
  membre$!: Observable<Membre>;
  membreUpdate!: FormGroup;
  passwordUpdate!: FormGroup;
  regexTel: RegExp = /^(\+261|0)3[2-4][0-9]{7}$/;
  regexMail: RegExp = /^[a-zA-Z0-9.+*?_-]+@[a-zA-Z0-9]{2,7}\.[a-zA-Z0-9]{2,4}$/;
  attrHide!: string;
  attrHideChangePassword!: string;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;
  inputPasswordType!: string;

  constructor(private formBuilter: FormBuilder,
      private edit: EditPortfolioService) { }

  ngOnInit(): void {
    this.membre$ = this.edit.getMembre().pipe(
      tap((reponses) => this.membre = reponses)
    );
    
    this.membreUpdate = this.formBuilter.group({
      user_github: [null],
      tel1: [null],
      tel2: [null],
      mail: [null],
      facebook: [null],
      linkedin: [null],
      cv: [null],
      adresse: [null],
      description: [null],
      fonction: [null],
      pdc: [null],
      dark: [null]
    });
    this.passwordUpdate = this.formBuilter.group({
      lastPassword: [null, [Validators.required]],
      newPassword: [null, [Validators.required, Validators.minLength(8)]],
      confirmPassword: [null, [Validators.required, Validators.minLength(8)]]
    });
    
    this.attrHide = "";
    this.attrHideChangePassword = "";
    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
    this.inputPasswordType = 'password';
  }

  // *************************** MODIFIER INFORMATIONS ***********************
  onUpdate(): void {
    this.membreUpdate = this.formBuilter.group({
      user_github: [this.membre.user_github, [Validators.required]],
      tel1: [this.membre.tel1, [Validators.required, Validators.pattern(this.regexTel)]],
      tel2: [this.membre.tel2],
      mail: [this.membre.mail, [Validators.required, Validators.pattern(this.regexMail)]],
      facebook: [this.membre.facebook],
      linkedin: [this.membre.linkedin],
      cv: [this.membre.cv],
      adresse: [this.membre.adresse, [Validators.required]],
      description: [this.membre.description],
      fonction: [this.membre.fonction],
      pdc: [this.membre.pdc],
      dark: [this.membre.dark, [Validators.required]]
    });
    this.attrHide = "modal";
  }

  onMembreUpdate(): void {
    this.attrHide = "";
    let toast = new window.bootstrap.Toast(document.getElementById('liveToast'));
    this.edit.updateMembre(this.membreUpdate.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          setTimeout(() => {
            this.membre$ = this.edit.getMembre().pipe(
              tap((reponses) => this.membre = reponses)
            );
          }, 500);
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Informations';
          this.messageToast = 'Modifié avec succès. Merci !';
        }
        else {
          this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
          this.titreToast = 'Erreur';
          this.messageToast = 'La modification n\'a pas été effectuée.';
        }
        toast.show();
        console.log(reponses);
      })
    ).subscribe();
  }

  // ******************** MODIFIER PASSWORD ***********************
  onUpdatePassword(): void {
    this.attrHideChangePassword = "modal";
  }

  onPutNullFormKey(): void {
    this.passwordUpdate = this.formBuilter.group({
      lastPassword: [null, [Validators.required]],
      newPassword: [null, [Validators.required, Validators.minLength(8)]],
      confirmPassword: [null, [Validators.required, Validators.minLength(8)]]
    });
  }

  onShowPassword(event:any): void {
    event.target.checked ? this.inputPasswordType = "text" : this.inputPasswordType = "password";
  }

  onPasswordUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToast'));
    const donnees:PasswordUpdate = this.passwordUpdate.value;
    if(donnees.newPassword !== donnees.confirmPassword) {
      this.onPutNullFormKey();
      this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
      this.titreToast = 'Erreur';
      this.messageToast = 'Veuillez bien confirmer votre mot de passe. Merci !';
      toast.show();
    }
    else {
      this.edit.updatePassword(donnees).pipe(
        tap((reponses) => {
          if(reponses === 1) {
            this.iconeToast = "fa-solid fa-check me-2";
            this.titreToast = 'Mot de passe';
            this.messageToast = 'Modifié avec succès. Merci !';
          }
          else {
            this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
            this.titreToast = 'Erreur';
            this.messageToast = 'Désolé, l\'ancien mot de passe n\'existe pas !';
          }
          toast.show();
        })
      ).subscribe()
    }
  }
}
