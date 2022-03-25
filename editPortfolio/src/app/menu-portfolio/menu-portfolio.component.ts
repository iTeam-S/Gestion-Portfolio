import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-menu-portfolio',
  templateUrl: './menu-portfolio.component.html',
  styleUrls: ['./menu-portfolio.component.scss']
})
export class MenuPortfolioComponent implements OnInit {

  constructor(private router: Router,
    private auth: AuthService) { }

  ngOnInit(): void {
  }

  onDeconnexion(): void {
    this.auth.setToken("");
    this.router.navigateByUrl('/');
  }
}
