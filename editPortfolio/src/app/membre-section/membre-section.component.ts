import { Component, OnInit, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Membre } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
import { Observable, tap } from 'rxjs';
import { Router } from '@angular/router';


@Component({
  selector: 'app-membre-section',
  templateUrl: './membre-section.component.html',
  styleUrls: ['./membre-section.component.scss']
})
export class MembreSectionComponent implements OnInit {
  membre!:Membre;
  membre$!: Observable<Membre>;
  membreUpdate!: FormGroup;
  regexTel: RegExp = /^(\+261|0)3[2-4][0-9]{7}$/;
  regexMail: RegExp = /^[a-zA-Z0-9.+*?_-]+@[a-zA-Z0-9]{2,7}\.[a-zA-Z0-9]{2,4}$/;

  constructor(private formBuilter: FormBuilder,
      private edit: EditPortfolioService) { }

  ngOnInit(): void {
    this.membre$ = this.edit.getMembre().pipe(
      tap((reponses) => this.membre = reponses)
    );
    this.membreUpdate = this.formBuilter.group({
      user_github: [null],
      tel1: [null, [Validators.required, Validators.pattern(this.regexTel)]],
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
  }

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
  }

  onMembreUpdate() {
    this.edit.updateMembre(this.membreUpdate.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          // this.membre$ = this.edit.getMembre();
          // this.router.navigateByUrl('edit');
          console.log(reponses);
        }
      })
    ).subscribe();
  }
}
