import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Membre } from '../models/edit-portfolio.model';
import { EditPortfolioService } from '../services/edti-portfolio.service';


@Component({
  selector: 'app-edit-portfolio',
  templateUrl: './edit-portfolio.component.html',
  styleUrls: ['./edit-portfolio.component.scss']
})
export class EditPortfolioComponent implements OnInit {

  membre$!:Observable<Membre>;

  constructor(private edit: EditPortfolioService ) { }

  ngOnInit(): void {
    this.membre$ = this.edit.getMembre();
  }
}
