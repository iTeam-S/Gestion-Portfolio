import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Fonction } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';
declare var window: any;

@Component({
  selector: 'app-fonction-section',
  templateUrl: './fonction-section.component.html',
  styleUrls: ['./fonction-section.component.scss']
})
export class FonctionSectionComponent implements OnInit {

  fonction!: Fonction;
  fonctionUpdate!: FormGroup;
  attrHideFonction!: string;
  regexIdPoste: RegExp = /(1|[3-9])/;
  iconeToast!: any;
  titreToast!: string | null;
  messageToast!: string | null;

  constructor(private edit: EditPortfolioService, 
    private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getFonction().pipe(
      tap((reponses) => this.fonction = reponses)
    ).subscribe();

    this.fonctionUpdate = this.formBuilder.group({
      id_poste: [null]
    });

    this.attrHideFonction = "modal";
    this.iconeToast = null;
    this.titreToast = null;
    this.messageToast = null;
  }

  onUpdate(): void {
    this.fonctionUpdate = this.formBuilder.group({
      id_poste: [this.fonction.id_poste, [Validators.required, Validators.pattern(this.regexIdPoste)]]
    });
  }

  onFonctionUpdate(id: number): void {
    const donnees = {...this.fonctionUpdate.value, id};
    let toast = new window.bootstrap.Toast(document.getElementById('liveToastFonction'));
    this.edit.updateFonction(donnees).pipe(
      tap((reponses) => {
        if(reponses === 1) {
            this.edit.getFonction().pipe(
              tap((reponses) => this.fonction = reponses)
            ).subscribe();
          this.iconeToast = "fa-solid fa-check me-2";
          this.titreToast = 'Fonction';
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
