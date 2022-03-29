import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Formations } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-formations-section',
  templateUrl: './formations-section.component.html',
  styleUrls: ['./formations-section.component.scss']
})
export class FormationsSectionComponent implements OnInit {
  formations!: Formations[];
  formation!: Formations;
  formationsUpdate!: FormGroup;
  idFormation!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService,
      private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getFormations().pipe(
      tap((reponses) => {
        this.formations = Object.values(reponses);
      })
    ).subscribe();

    this.formationsUpdate = this.formBuilder.group({
      lieu: [null],
      annee: [null],
      type: [null],
      description: [null]
    });

    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(formation: Formations): void {
    this.formationsUpdate = this.formBuilder.group({
      lieu: [formation.lieu, [Validators.required]],
      annee: [formation.annee, [Validators.required]],
      type: [formation.type, [Validators.required]],
      description: [formation.description]
    });
    this.idFormation = formation.id;
  }

  onDelete(id: number) {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastFormations'));
    this.edit.deleteFormations(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getFormations().pipe(
            tap((reponses) => {
              this.formations = Object.values(reponses);
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Formation';
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

  onFormationsUpdate() {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastFormations'));
    const id = this.idFormation;
    const donnees = {...this.formationsUpdate.value, id};
    this.edit.updateFormations(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getFormations().pipe(
            tap((reponses) => {
              this.formations = Object.values(reponses);
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Formation';
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
}
