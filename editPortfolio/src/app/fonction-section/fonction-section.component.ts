import { Component, OnInit } from '@angular/core';
import { Observable, tap } from 'rxjs';
import { Fonction } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';

@Component({
  selector: 'app-fonction-section',
  templateUrl: './fonction-section.component.html',
  styleUrls: ['./fonction-section.component.scss']
})
export class FonctionSectionComponent implements OnInit {

  fonction!: Fonction;
  fonction$!: Observable<Fonction>;

  constructor(private edit: EditPortfolioService) { }

  ngOnInit(): void {
    this.fonction$ = this.edit.getFonction();
  }

}
