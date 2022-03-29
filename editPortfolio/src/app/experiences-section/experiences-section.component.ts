import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { tap } from 'rxjs';
import { Experiences } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';

@Component({
  selector: 'app-experiences-section',
  templateUrl: './experiences-section.component.html',
  styleUrls: ['./experiences-section.component.scss']
})
export class ExperiencesSectionComponent implements OnInit {
  experiences!: Experiences[];
  experience!: Experiences;
  experiencesUpdate!: FormGroup;

  constructor(private edit: EditPortfolioService,
      private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.edit.getExperiences().pipe(
      tap((reponses) => {
        this.experiences = Object.values(reponses);
        console.table(this.experiences);
      })
    ).subscribe();
  }

  onUpdate(experience: Experiences): void {

  }

  onDelete(id: number): void {

  }
}
