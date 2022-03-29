import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { tap } from 'rxjs';
import { Formations } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';

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

  constructor(private edit: EditPortfolioService,
      private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getFormations().pipe(
      tap((reponses) => {
        this.formations = Object.values(reponses);
        // console.table(this.formations);
      })
    ).subscribe();

    this.formationsUpdate = this.formBuilder.group({
      lieu: [null],
      annee: [null],
      type: [null],
      description: [null]
    });
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

  onFormationsUpdate() {
    const id = this.idFormation;
    const donnees = {...this.formationsUpdate.value, id}
    console.table(donnees);
  }
}
