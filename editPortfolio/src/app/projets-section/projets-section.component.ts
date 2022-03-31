import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Projets } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-projets-section',
  templateUrl: './projets-section.component.html',
  styleUrls: ['./projets-section.component.scss']
})
export class ProjetsSectionComponent implements OnInit {

  projets!: Projets[];
  projet!: Projets;
  projetsUpdate!: FormGroup;
  projetsAdd!: FormGroup;
  regexOrdre: RegExp = /[0-9]+/;
  idProjets!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService,
    private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getProjets().pipe(
      tap((reponses) => this.projets = Object.values(reponses))
    ).subscribe();

    this.projetsUpdate = this.formBuilder.group({
      nom: [null],
      description: [null],
      lien: [null],
      pdc: [null],
      ordre: [null]
    });

    this.projetsAdd = this.formBuilder.group({
      nom: [null, [Validators.required]],
      description: [null, [Validators.required]],
      lien: [null, [Validators.required]],
      pdc: [null, [Validators.required]],
      ordre: [null, [Validators.required, Validators.pattern(this.regexOrdre)]]
    });

    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(projet: Projets): void {
    this.projetsUpdate = this.formBuilder.group({
      nom: [projet.nom, [Validators.required]],
      description: [projet.description, [Validators.required]],
      lien: [projet.lien, [Validators.required]],
      pdc: [projet.pdc, [Validators.required]],
      ordre: [projet.ordre, [Validators.required, Validators.pattern(this.regexOrdre)]]
    });
    this.idProjets = projet.id;
  }

  onDelete(id: number): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastProjets'));
    this.edit.deleteProjets(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getProjets().pipe(
            tap((reponses) => this.projets = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Projet';
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

  onProjetsUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastProjets'));
    const id = this.idProjets;
    const donnees = {...this.projetsUpdate.value, id};
    this.edit.updateProjets(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getProjets().pipe(
            tap((reponses) => this.projets = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Projet';
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

  onProjetsAdd(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastProjets'));
    this.edit.addProjets(this.projetsAdd.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getProjets().pipe(
            tap((reponses) => this.projets = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Projet';
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
