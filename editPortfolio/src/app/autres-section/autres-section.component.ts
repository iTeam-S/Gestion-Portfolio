import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Autres } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-autres-section',
  templateUrl: './autres-section.component.html',
  styleUrls: ['./autres-section.component.scss']
})
export class AutresSectionComponent implements OnInit {

  autres!: Autres[];
  autre!: Autres
  autresUpdate!: FormGroup;
  autresAdd!: FormGroup;
  idAutres!: number;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService,
      private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getAutres().pipe(
      tap((reponses) => this.autres = Object.values(reponses))
    ).subscribe();

    this.autresUpdate = this.formBuilder.group({
      nom: [null],
      lien: [null]
    });

    this.autresAdd = this.formBuilder.group({
      nom: [null, [Validators.required]],
      lien: [null, [Validators.required]]
    });


    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(autre: Autres): void {
    this.autresUpdate = this.formBuilder.group({
      nom: [autre.nom, [Validators.required]],
      lien: [autre.lien, [Validators.required]]
    });
    this.idAutres = autre.id;
  }

  onDelete(id: number): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastAutres'));
    this.edit.deleteAutres(id.toString()).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getAutres().pipe(
            tap((reponses) => this.autres = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Autre';
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

  onAutresUpdate(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastAutres'));
    const id = this.idAutres;
    const donnees = {...this.autresUpdate.value, id};
    this.edit.updateAutres(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getAutres().pipe(
            tap((reponses) => this.autres = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Autre';
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

  onAutresAdd(): void {
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastAutres'));
    this.edit.addAutres(this.autresAdd.value).pipe(
      tap((reponses) => {
        if(reponses === 1) {
          this.edit.getAutres().pipe(
            tap((reponses) => this.autres = Object.values(reponses))
          ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Autre';
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
