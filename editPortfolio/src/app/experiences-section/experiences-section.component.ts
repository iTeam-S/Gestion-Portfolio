import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Experiences } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-experiences-section',
  templateUrl: './experiences-section.component.html',
  styleUrls: ['./experiences-section.component.scss']
})
export class ExperiencesSectionComponent implements OnInit {
  experiences!: Experiences[];
  experience!: Experiences;
  experiencesUpdate!: FormGroup;
  experiencesAdd!: FormGroup;
  idExperiences!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService,
      private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getExperiences().pipe(
      tap((reponses) => {
        this.experiences = Object.values(reponses);
      })
    ).subscribe();

    this.experiencesUpdate = this.formBuilder.group({
      nom: [null],
      annee: [null],
      type: [null],
      description: [null]
    });

    this.experiencesAdd = this.formBuilder.group({
      nom: [null, [Validators.required]],
      annee: [null, [Validators.required]],
      type: [null, [Validators.required]],
      description: [null]
    });

    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(experience: Experiences): void {
    this.experiencesUpdate = this.formBuilder.group({
      nom: [experience.nom, [Validators.required]],
      annee: [experience.annee, [Validators.required]],
      type: [experience.type, [Validators.required]],
      description: [experience.description]
    });
    this.idExperiences = experience.id;
  }

  onDelete(id: number): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastExperiences'));
    this.edit.deleteExperiences(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getExperiences().pipe(
            tap((reponses) => {
              this.experiences = Object.values(reponses);
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Expérience';
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

  onExperiencesUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastExperiences'));
    const id = this.idExperiences;
    const donnees = {...this.experiencesUpdate.value, id};
    this.edit.updateExperiences(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getExperiences().pipe(
            tap((reponses) => {
              this.experiences = Object.values(reponses);
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Expérience';
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

  onExperiencesAdd(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastExperiences'));
    this.edit.addExperiences(this.experiencesAdd.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getExperiences().pipe(
            tap((reponses) => {
              this.experiences = Object.values(reponses);
            })
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Expérience';
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
