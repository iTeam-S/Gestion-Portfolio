import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Competences } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-competences-section',
  templateUrl: './competences-section.component.html',
  styleUrls: ['./competences-section.component.scss']
})
export class CompetencesSectionComponent implements OnInit {
  competences!: Competences[];
  competence!: Competences;
  competencesUpdate!: FormGroup;
  competencesAdd!: FormGroup;
  idCompetences!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;
  regexIdCategorie: RegExp = /[1-6]/;

  constructor(private edit: EditPortfolioService,
    private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getCompetences().pipe(
      tap((reponses) => {
        this.competences = Object.values(reponses);
        for(let competence of this.competences) {
          if(competence.icone === 'et-layers') {
            competence.icone = 'layer-group';
          }
          else {
            competence.icone = competence.icone.replace(/et-/g, '');
          }
        }
      })
    ).subscribe();

    this.competencesUpdate = this.formBuilder.group({
      nom: [null],
      liste: [null],
      id_categorie: [null]
    });

    this.competencesAdd = this.formBuilder.group({
      nom: [null, [Validators.required]],
      liste: [null, [Validators.required]],
      id_categorie: [null, [Validators.required, Validators.pattern(this.regexIdCategorie)]]
    });

    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(competence: Competences): void {
    this.competencesUpdate = this.formBuilder.group({
      nom: [competence.nom, [Validators.required]],
      liste: [competence.liste, [Validators.required]],
      id_categorie: [competence.id_categorie, [Validators.required, Validators.pattern(this.regexIdCategorie)]]
    });
    this.idCompetences = competence.id;
  }

  onDelete(id: number): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastCompetences'));
    this.edit.deleteCompetences(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getCompetences().pipe(
            tap((reponses) => {
              this.competences = Object.values(reponses);
              for(let competence of this.competences) {
                if(competence.icone === 'et-layers') {
                  competence.icone = 'layer-group';
                }
                else {
                  competence.icone = competence.icone.replace(/et-/g, '');
                }
              }
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Competence';
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

  onCompetencesUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastCompetences'));
    const id = this.idCompetences;
    const donnees = {...this.competencesUpdate.value, id};
    this.edit.updateCompetences(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getCompetences().pipe(
            tap((reponses) => {
              this.competences = Object.values(reponses);
              for(let competence of this.competences) {
                if(competence.icone === 'et-layers') {
                  competence.icone = 'layer-group';
                }
                else {
                  competence.icone = competence.icone.replace(/et-/g, '');
                }
              }
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Competence';
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

  onCompetencesAdd(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastCompetences'));
    this.edit.addCompetences(this.competencesAdd.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getCompetences().pipe(
            tap((reponses) => {
              this.competences = Object.values(reponses);
              for(let competence of this.competences) {
                if(competence.icone === 'et-layers') {
                  competence.icone = 'layer-group';
                }
                else {
                  competence.icone = competence.icone.replace(/et-/g, '');
                }
              }
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Competence';
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
