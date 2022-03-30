import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Distinctions } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-distinctions-section',
  templateUrl: './distinctions-section.component.html',
  styleUrls: ['./distinctions-section.component.scss']
})
export class DistinctionsSectionComponent implements OnInit {

  distinctions!: Distinctions[];
  distinction!: Distinctions;
  distinctionsUpdate!: FormGroup;
  distinctionsAdd!: FormGroup;
  regexOrdre: RegExp = /[0-9]+/;
  idDistinctions!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService,
    private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getDistinctions().pipe(
      tap((reponses) => this.distinctions = Object.values(reponses))
    ).subscribe();

    this.distinctionsUpdate = this.formBuilder.group({
      organisateur: [null],
      annee: [null],
      type: [null],
      description: [null],
      ordre: [null]
    });

    this.distinctionsAdd = this.formBuilder.group({
      organisateur: [null, [Validators.required]],
      annee: [null, [Validators.required]],
      type: [null, [Validators.required]],
      description: [null],
      ordre: [null, [Validators.required, Validators.pattern(this.regexOrdre)]]
    });

    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(distinction: Distinctions): void {
    this.distinctionsUpdate = this.formBuilder.group({
      organisateur: [distinction.organisateur, [Validators.required]],
      annee: [distinction.annee, [Validators.required]],
      type: [distinction.type, [Validators.required]],
      description: [distinction.description],
      ordre: [distinction.ordre, [Validators.required, Validators.pattern(this.regexOrdre)]]
    });
    this.idDistinctions = distinction.id;
  }

  onDelete(id: number): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastDistinctions'));
    this.edit.deleteDistinctions(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getDistinctions().pipe(
            tap((reponses) => this.distinctions = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Distinction';
          this.messageToast = 'Supprimée avec succès. Merci !';
        }
        else {
          this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
          this.titreToast = 'Erreur';
          this.messageToast = 'La suppression n\'a pas été effectuée.';
        }
        toast.show();
      })
    ).subscribe();
  }

  onDistinctionsUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastDistinctions'));
    const id = this.idDistinctions;
    const donnees = {...this.distinctionsUpdate.value, id};
    this.edit.updateDistinctions(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getDistinctions().pipe(
            tap((reponses) => this.distinctions = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Distinction';
          this.messageToast = 'Modifié avec succès. Merci !';
        }
        else {
          this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
          this.titreToast = 'Erreur';
          this.messageToast = 'La modification n\'a pas été effectuée.';
        }
        toast.show();
      })
    ).subscribe();
  }

  onDistinctionsAdd(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastDistinctions'));
    this.edit.addDistinctions(this.distinctionsAdd.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getDistinctions().pipe(
            tap((reponses) => this.distinctions = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Distinction';
          this.messageToast = 'Ajouter avec succès. Merci !';
        }
        else {
          this.iconeToast = "fa-solid fa-triangle-exclamation me-2";
          this.titreToast = 'Erreur';
          this.messageToast = 'L\'ajout n\'a pas été effectuée.';
        }
        toast.show();
      })
    ).subscribe();
  }
}
