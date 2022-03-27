import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';
import { Membre } from '../models/edit-portfolio.model';

@Component({
  selector: 'app-menu-portfolio',
  templateUrl: './menu-portfolio.component.html',
  styleUrls: ['./menu-portfolio.component.scss']
})
export class MenuPortfolioComponent implements OnInit {
  @Input() membre!: Membre;
  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  onDeconnexion(): void {
    localStorage.removeItem('lahatra-iTeam-$');
    this.router.navigateByUrl('/');
  }
}
